<!DOCTYPE html>
<html>
<head>
    <title>Change Bitrate</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-darkly.min.css">
</head>
<body>
    <div class="container" style="margin-top: 200px;">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h1>Change Bitrate</h1>
                <form method="POST" enctype="multipart/form-data" action="http://139.180.128.118:4010/php/api/videoc/c.php" id="conversion-form">
                    <div class="form-group">
                        <label>Select video</label>
                        <input type="file" name="video" class="form-control" required="" accept="video/*">
                    </div>
                    <div class="form-group">
                        <label>Select bitrate</label>
                        <select name="bitrate" class="form-control">
                            <option value="350k">240p</option>
                            <option value="700k">360p</option>
                            <option value="1200k">480p</option>
                            <option value="2500k">720p</option>
                            <option value="5000k">1080p</option>
                        </select>
                    </div>
                    <input type="submit" name="change_bitrate" class="btn btn-info" value="Change bitrate">
                </form>
                <div id="progress-container" style="display: none;">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" id="progress-bar"></div>
                    </div>
                    <p id="progress-status">Converting...</p>
                </div>
                <div id="download-link" style="display: none;">
                    <a href="#" id="download-button" class="btn btn-success">Download Converted Video</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#conversion-form").submit(function(event) {
                event.preventDefault();

                var formData = new FormData($(this)[0]);

                $("#conversion-form").hide();
                $("#progress-container").show();

                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(e) {
                            if (e.lengthComputable) {
                                var percent = Math.round((e.loaded / e.total) * 100);
                                $("#progress-bar").css("width", percent + "%");
                                $("#progress-status").text("Converting: " + percent + "%");
                            }
                        }, false);
                        return xhr;
                    },
                    url: "convert.php", // Modify this to your conversion script.
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#progress-container").hide();
                        $("#download-link").show();
                        $("#download-button").attr("href", response);
                    }
                });
            });
        });
    </script>
</body>
</html>



<?php

if (isset($_FILES["video"])) {
    $bitrate = $_POST["bitrate"];
    $tempVideo = $_FILES["video"]["tmp_name"];
    
    $outputVideo = "output.mp4"; // Define your desired output file name here.

    $command = "/usr/bin/ffmpeg -i $tempVideo -b:v $bitrate -bufsize $bitrate $outputVideo";
    exec($command);

    // Return the link to the converted video.
    echo $outputVideo;
} else {
    echo "Error: Video not provided.";
}
