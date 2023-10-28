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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #section_container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            padding-bottom: 2rem;
        }

        .div_for_every_api {
            display: flex;
            gap: 1rem;
            justify-content: flex-start;
            padding-left: 5rem;


        }

        .div1_for_img {}

        .div1_for_img img {
            max-width: 231px;
            max-height: 200px;
            border: 1px solid #822826;
            background: lightgray -118.087px -243.789px / 200.996% 311.663% no-repeat;
            border-radius: 8px;


        }

        .api_result_container {
            display: flex;
            gap: 3rem;
            flex-direction: column;


        }

        .div2_for_info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .div2_for_info a {
            position: relative;
            top: -0.3rem;
        }

        #trending_recommmended_highlight_container {
            display: flex;
            justify-content: space-between;
            gap: 4rem;



        }

        #recommended {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        #trending {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }


        #recommended p:first-child {
            color: #A8944D;
            font-family: Montserrat;
            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        #today_highlight {
            display: flex;
            flex-direction: column;
            gap: 1rem;

        }

        #today_highlight p:first-child {
            align-self: center;
            color: #A8944D;
            font-family: Montserrat;
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        #trending p:first-child {
            color: #A8944D;
            font-family: Montserrat;
            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            align-self: flex-end;

        }

        .create_div_for_every_article {
            display: flex;
            gap: 1.5rem;
            padding: 0.5rem;
            border-radius: 6.246px;
            background: rgba(168, 148, 77, 0.20);
            transition: all 0.5s;
        }

        .create_div_for_every_article:hover {
            background-color: #A8944D;


        }

        .create_div_for_every_article .div_for_description {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 1rem;
        }

        #trending_recommmended_highlight_container {
            padding: 5rem;
        }

        .div_for_highlight {
            display: flex;
            gap: 1rem;
        }

        #create_author_name_forHighlight {
            color: #A8944D;
            font-family: Roboto;
            font-size: 10.301px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border-radius: 5px;
            background: #000;
            display: flex;
            width: fit-content;
            padding: 1rem;
            justify-content: center;
            align-items: center;
            position: relative;
            bottom: 7rem;
            z-index: 10;
            align-self: center;
            transition: all 0.5s;
            opacity: 1;
        }

        .icon_circle_for_highlight:nth-child(1) {
            border-radius: 25px;
            border: 2px solid #A8944D;
            background: #D9D9D9;
        }

        .for_image {
            align-self: center;
        }

        .data_search_container {
            display: flex;
            justify-content: center;
            height: fit-content;
        }

        .data_search_container input {
            background-color: #312424;
            padding: 0.6rem;
            border: 1px solid #A8944D;
            border-radius: 7px;
            color: azure;
            width: 17rem;
        }

        .data_search_container input::placeholder {
            color: #E9E9E9;
            font-family: Roboto;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            text-align: left;

        }

        .data_search_container p {
            border-radius: 5px;
            background: #A8944D;
            color: #E9E9E9;
            font-family: Roboto;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            padding: 0.5rem;
            position: relative;
            right: 3%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 1rem;
            padding-right: 1rem;


        }

        #search_and_more_articles_container {
            display: flex;
            justify-content: space-between;
            padding-bottom: 5rem;
            padding-left: 5rem;
            padding-right: 5rem;

        }

        #search_and_more_articles_container .more_articles {
            display: flex;
            width: max-content;
            justify-content: center;
            align-items: center;
            padding: 0.5rem;
            padding-top: 0.8rem;
            padding-left: 0.9rem;

            padding-right: 0.9rem;
            color: #822826;
            font-family: IBM Plex Sans;
            font-size: 14.4px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border-radius: 6px;
            background: linear-gradient(270deg, #A8944D 0%, #E8DDB5 106.23%);


        }

        .create_author_name_for_article_page {
            position: relative;
            bottom: 3rem;
        }

        @media screen and (max-width:1320px) {
            .create_author_name_for_article_page {

                bottom: 2.5rem !important;
                font-size: 14px !important;
            }

            #search_and_more_articles_container {
                display: flex;
                justify-content: center;
                gap: 5rem;
                padding: 5rem;

            }

            .desc_forArticle {
                width: 16rem;
                font-size: 9px !important;
            }

            .for_image img {
                width: 90px !important;
            }

            < !-- #trending_recommmended_highlight_container {
                gap: 1rem !important;
            }

            -->< !-- #trending,
            #recommended {
                gap: 0.7rem;
            }

            -->#list_of_api_section {
                align-self: center;
            }

            #trending_recommmended_highlight_container {

                display: grid !important;
                grid-template-columns: auto !important;
                gap: 1rem !important;
                justify-content: center !important;
            }

            #trending,
            #recommended {
                gap: 1.5rem;

            }

            #trending p:first-child {
                align-self: flex-start;
            }

            #today_highlight {
                justify-self: center;
            }

            .div2_for_info p:first-child {
                width: 300px !important;
                font-size: 15px !important;
            }

            .div2_for_info a p:first-child {
                width: 85px !important;
            }

            .div_for_every_api {
                padding: 1rem;
                justify-content: center;
            }
        }

        @media screen and (max-width:1097px) {
            .create_author_name_for_article_page {

                bottom: 2rem !important;
            }

            #list_of_api_section {
                align-self: center;
            }

            #trending_recommmended_highlight_container {

                display: grid !important;
                grid-template-columns: auto !important;
                gap: 1rem !important;
                justify-content: center !important;
            }

            #trending,
            #recommended {
                gap: 1.5rem;

            }

            #trending p:first-child {
                align-self: flex-start;
            }

            #today_highlight {
                justify-self: center;
            }

            .div2_for_info p:first-child {
                width: 300px !important;
                font-size: 15px !important;
            }

            .div2_for_info a p:first-child {
                width: 85px !important;
            }

            .div_for_every_api {
                padding: 1rem;
            }
        }

        @media screen and (max-width:630px) {
            .create_author_name_for_article_page {

                bottom: 1rem !important;
                font-size: 10px !important;
                padding: 0.1rem !important;
            }

            #search_and_more_articles_container .more_articles {
                font-size: 9px !important;
                white-space: nowrap;

            }

            .data_search_container input {
                width: 10rem !important;
            }

            .desc_forArticle {
                width: 14rem !important;
            }

            #list_of_api_section {
                align-self: flex-start !important;
            }

            .div2_for_info p:first-child {
                width: 200px !important;
                font-size: 10px !important;
                white-space: break !important;
            }

            .div_for_every_api {
                padding-left: 3.1rem;
            }

            .div2_for_info a p:first-child {
                width: 85px !important;
            }

            .div1_for_img img {
                width: 109px !important;
            }

            .create_div_for_every_article {
                width: 90%;

            }

            .div_for_highlight img {
                width: 20rem !important;
                object-fit: cover;
            }

            #today_highlight {
                position: relative;
                right: 1.5rem;
            }

        }

        @media screen and (max-width:430px) {
            #search_and_more_articles_container {
                gap: 2.7rem !important;
                padding: 0.5rem !important;
            }

            #today_highlight {
                right: 0.1rem !important;
            }

            .div_for_every_api {
                padding-left: 0.1rem !important;
            }

            .create_div_for_every_article {
                width: 80% !important;
            }

            .desc_forArticle {
                width: 9rem !important;
            }

            #trending,
            #recommended {}

            .div_for_highlight img {
                width: 16rem !important;
                height: 379px !important;
            }
        }
    </style>
    <script src="/js/articles.js" defer></script>
</head>

<body>
    <?php
    include_once("/var/www/72-dragons-health-at-apha/view/header.php");
    ?>
    <main>
        <div id="section_container">
            <section id="highlight_section">
                <div id="trending_recommmended_highlight_container">
                    <div id="recommended">
                        <p class="title_recommend">Trending</p>

                    </div>
                    <div id="today_highlight">
                        <p>Today’s Highlights</p>
                    </div>
                    <!-- <div id="trending">
                        <p class="title_recommend">Trending</p>
                    </div> -->
                </div>
            </section>

            <section id="more_articles_title_section">
                <div id="search_and_more_articles_container">
                    <p class="more_articles">More Articles</p>
                    <div class="data_search_container">
                        <input type="text" placeholder="search">
                        <p id="go_out_for_search">Go</p>
                    </div>
                </div>
            </section>

            <section id="list_of_api_section">
                <div class="api_result_container">

                </div>
            </section>
        </div>
    </main>



    <?php
    include_once("/var/www/72-dragons-health-at-apha/view/footer.php");
    ?>

    <!-- page session by sushmita -->
    <script> 
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/php/api/dbLog.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");  
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(xhr.responseText); 

            } else {
                console.log("Request failed with status: " + xhr.status);
            }
        };
        xhr.onerror = function () {
            console.log("Network error occurred");
        };
        xhr.send();
    </script>
</body>




</html>