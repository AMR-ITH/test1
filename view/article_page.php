<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM Plex Sans:wght@700&display=swap"     />
    <link       rel="stylesheet"      
        href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;700&display=swap"     />
    <link       rel="stylesheet"      
        href="https://fonts.googleapis.com/css2?family=Helvetica:wght@400;700&display=swap" />
    <link       rel="stylesheet"      
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" />



    <link       rel="stylesheet"      
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap"     />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@600;800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM Plex Sans:wght@700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/header.css" />
    <script src="/js/header.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .pdf_data_container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #pdf_container {
            display: flex;
            flex-direction: column;
            gap: 3rem;
            padding-top: 3rem;

        }

        .title_and_author_container {
            display: flex;
            flex-direction: column;
            align-self: center;
            padding-bottom: 1rem;
            border-bottom: 2px solid #A8944D;
            width: 60%;

        }

        .title_and_author_container span {
            color: #A8944D;
        }

        .title_and_author_container span:first-child {
            font-size: 20px;
            font-family: Roboto;
        }

        .title_and_author_container span:last-child {
            font-family: Roboto;
        }
    </style>

</head>

<body>
    <?php
    include_once("/var/www/72-dragons-health-at-apha/view/header.php");
    ?>
    <main>
        <section id="pdf_container">
            <div class="title_and_author_container">
                <span class="title_info">
                </span>
                <span class="author_info">
                </span>
            </div>
            <div class="pdf_data_container">
            </div>
        </section>
    </main>



    <?php
    include_once("/var/www/72-dragons-health-at-apha/view/footer.php");
    ?>
</body>
<script>

    $(document).ready(function () {
        // let data = localStorage.getItem('highlight');
        // let json_data = JSON.parse(data);
        // let read_data = localStorage.getItem('read_now');
        let url_data = window.location.href;
        let newss_title = url_data.split('?').pop().replace(/%20/g, " ");
        console.log("data_____", newss_title);

        $.ajax({
            url: "/php/api/all_health_or_apha_articles_api.php",
            method: "GET",
            dataType: "json",
            data: {
                // trending: true,
                articletype: "apha",
            },
            success: function (data) {
                console.log(data);
                let articles_api_data = data.articles;
                let newPdf_url = articles_api_data.find((ele) => ele.news_title.replace(/\s/g, "") === newss_title.replace(/\s/g, ""))
                console.log("newPdf", newPdf_url)
                let pdfViewer = document.createElement('iframe');

                pdfViewer.setAttribute('src', "https://72dragons.health" + "/" + newPdf_url.pdf_url + "#toolbar=0");
                pdfViewer.setAttribute('width', '60%');
                pdfViewer.setAttribute('height', '1000px');



                $('.title_info').text(newPdf_url.news_title);
                $('.author_info').text(newPdf_url.author_name);


                $('.pdf_data_container').append(pdfViewer);

            },
            error: function (e) { },
        });

        // let read_json_data = JSON.parse(read_data);




        // if (json_data) {
        //     // Assuming you have a PDF viewer or a way to display the PDF content
        //     // Use an <embed> or <iframe> element or a PDF viewer library to render the PDF
        //     let pdfViewer = document.createElement('iframe');

        //     pdfViewer.setAttribute('src', json_data.pdf + "#toolbar=0");
        //     pdfViewer.setAttribute('width', '60%');
        //     pdfViewer.setAttribute('height', '1000px');



        //     $('.title_info').text(json_data.title);
        //     $('.author_info').text(json_data.author);


        //     $('.pdf_data_container').append(pdfViewer);
        // }


        // if (read_data) {
        //     let pdfViewer = document.createElement('embed');
        //     pdfViewer.setAttribute('src', read_data.pdf);
        //     pdfViewer.setAttribute('width', '60%');
        //     pdfViewer.setAttribute('height', '1000px');



        //     $('.title_info').text(read_data.title);
        //     $('.author_info').text(read_data.author);


        //     $('.pdf_data_container').append(pdfViewer);
        // }

    });
</script>

</html>