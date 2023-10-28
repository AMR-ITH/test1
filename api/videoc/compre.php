<link rel="stylesheet" type="text/css" href="bootstrap-darkly.min.css">
 
<div class="container" style="margin-top: 200px;">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1>Change bitrate</h1>
 
            <form method="POST" enctype="multipart/form-data" action="">
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
        </div>
    </div>
</div>



<?php
 
$video = $_FILES["video"]["tmp_name"];
$bitrate = $_POST["bitrate"];
 
$command = "/usr/bin/ffmpeg -i $video -b:v $bitrate -bufsize $bitrate output.mp4";
system($command);
 
echo "File has been converted";

?>