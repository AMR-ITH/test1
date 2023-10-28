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
            /* gap: 1rem; */
        }

        #aside_bar_container {
            width: 148px;
            background: linear-gradient(180deg, #000 0%, #230201 70.68%, #2D0201 100%), #822826;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            position: sticky;
            left: 0;
            bottom: 0;
            top: 0;
            z-index: -10;

        }

        .aside_bar {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 20rem;
            justify-self: center;


        }

        .facebook_post_aside,
        .instagram_post_aside {
            display: flex;
            flex-direction: column;

        }

        .facebook_post_aside .facebook_text,
        .instagram_post_aside .instagram_text {
            color: #A8944D;
            width: inherit;
            text-align: center;
            font-family: Montserrat;
            font-size: 8.823px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            align-self: center;
        }

        .facebook_post_aside .facebook_icon,
        .instagram_post_aside .instagram_icon {
            align-self: center;
        }

        .desc_for_post {
            color: #A8944D;
            text-align: center;
            font-family: Montserrat;
            font-size: 11px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            overflow-y: auto;
            align-self: center;


        }







        #facebook_post_container

        /*#instagram_post_container*/
            {
            display: flex;
            gap: 1rem;
            z-index: -20;
            padding-top: 1rem;
            padding-bottom: 1rem;
            overflow: hidden;
            /* Hide the scrollbar */
            padding-right: 1rem;
            width: 100%;

            padding-bottom: 1rem;

            /* Prevent content from wrapping */

        }

        #facebook_post_container::-webkit-scrollbar {}

        /*  #instagram_post_container::-webkit-scrollbar {
            visibility: hidden;
        }*/

        #instagram_and_facebook_container {
            width: 90%;
            padding-bottom: 1rem;
            padding-top: 2rem;
        }


        /* ::-webkit-scrollbar {
            display: none;
        } */


        .postData_container {
            display: flex;
            gap: 1rem;
            position: relative;
            border-bottom: 2px solid #A8944D;
            padding-bottom: 2rem;
        }

        .note {
            color: #A8944D;
            font-family: Roboto;
            font-weight: bolder;
            z-index: 1;
            width: 42rem;
        }

        @media screen and (max-width:900px) {
            #instagram_and_facebook_container .note {
                width: 34rem !important;
            }
        }

        @media screen and (max-width:649px) {
            #instagram_and_facebook_container .note {
                width: 16rem !important;
                font-size: 0.6rem;
            }

            #aside_bar_container {
                padding: 0rem;
            }
        }
    </style>

</head>

<body>
    <?php
    include_once("/var/www/72-dragons-health-at-apha/view/header.php");
    ?>
    <main>

        <div id="section_container">
            <section id="aside_bar_container">
                <aside class="aside_bar">
                    <div class="facebook_post_aside">
                        <span class="facebook_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26"
                                fill="none">
                                <path
                                    d="M1.50188 0H25.515C26.3419 0 27 0.63375 27 1.43V24.57C27 25.35 26.3419 26 25.515 26H18.63V15.925H22.14L22.6631 12.0088H18.63V9.50625C18.63 8.36875 18.9675 7.58875 20.655 7.58875H22.815V4.07875C22.4438 4.03 21.1612 3.9325 19.6763 3.9325C16.5544 3.9325 14.4281 5.7525 14.4281 9.11625V12.0088H10.9012V15.925H14.4281V26H1.50188C1.10646 26 0.726987 25.8499 0.445811 25.5822C0.164635 25.3144 0.00444287 24.9507 0 24.57V1.43C0 0.63375 0.675 0 1.50188 0Z"
                                    fill="#CCAE5D" />
                            </svg>
                        </span>
                        <span class="facebook_text">
                            Facebook Post
                        </span>
                    </div>
                    <!-- <div class="instagram_post_aside">
                        <span class="instagram_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="27" viewBox="0 0 28 27"
                                fill="none">
                                <path
                                    d="M15.4392 0.00166098C16.4608 -0.00211919 17.4824 0.00778152 18.5037 0.0313601L18.7752 0.0408097C19.0888 0.0516093 19.3982 0.0651088 19.772 0.0813083C21.2615 0.148806 22.2779 0.375598 23.1696 0.709037C24.0936 1.05193 24.8719 1.51631 25.6503 2.26688C26.362 2.94133 26.9128 3.75716 27.2644 4.65765C27.6102 5.51757 27.8454 6.49899 27.9154 7.93534C27.9322 8.29443 27.9462 8.59412 27.9574 8.89651L27.9658 9.1584C27.9906 10.1428 28.0014 11.1274 27.998 12.1121L27.9994 13.1192V14.8876C28.0028 15.8727 27.9921 16.8578 27.9672 17.8427L27.9588 18.1045C27.9476 18.4069 27.9336 18.7053 27.9168 19.0657C27.8468 20.5021 27.6088 21.4821 27.2644 22.342C26.9139 23.2435 26.363 24.06 25.6503 24.7342C24.9503 25.4204 24.1038 25.9515 23.1696 26.2907C22.2779 26.6241 21.2615 26.8509 19.772 26.9184C19.3982 26.9346 19.0888 26.9481 18.7752 26.9589L18.5037 26.967C17.4824 26.991 16.4608 27.0013 15.4392 26.998L14.3949 26.9994H12.5624C11.5408 27.0027 10.5192 26.9924 9.49792 26.9683L9.22633 26.9602C8.89401 26.9486 8.56175 26.9351 8.22959 26.9197C6.74006 26.8522 5.72371 26.6228 4.83056 26.2907C3.89637 25.9523 3.05018 25.4211 2.35129 24.7342C1.63879 24.0596 1.08747 23.2432 0.73577 22.342C0.389988 21.4821 0.1548 20.5021 0.0848034 19.0657C0.0692122 18.7454 0.0552128 18.425 0.0428056 18.1045L0.0358061 17.8427C0.00999644 16.8578 -0.00167088 15.8727 0.00080776 14.8876V12.1121C-0.00309939 11.1274 0.00716784 10.1428 0.0316063 9.1584L0.0414057 8.89651C0.0526052 8.59412 0.0666044 8.29443 0.0834035 7.93534C0.1534 6.49764 0.388588 5.51892 0.73437 4.65765C1.08627 3.75672 1.63867 2.94111 2.35269 2.26823C3.0511 1.58077 3.89675 1.04865 4.83056 0.709037C5.72371 0.375598 6.73866 0.148806 8.22959 0.0813083L9.22633 0.0408097L9.49792 0.0340601C10.5187 0.00918425 11.5398 -0.00206658 12.561 0.000311121L15.4392 0.00166098ZM14.0001 6.75143C13.0726 6.73878 12.1518 6.90401 11.2912 7.23751C10.4305 7.571 9.64722 8.06612 8.98673 8.69409C8.32624 9.32205 7.80177 10.0703 7.44379 10.8955C7.08581 11.7206 6.90146 12.6061 6.90146 13.5005C6.90146 14.395 7.08581 15.2805 7.44379 16.1056C7.80177 16.9307 8.32624 17.679 8.98673 18.307C9.64722 18.9349 10.4305 19.43 11.2912 19.7635C12.1518 20.097 13.0726 20.2623 14.0001 20.2496C15.8565 20.2496 17.6369 19.5385 18.9496 18.2727C20.2623 17.0068 20.9997 15.29 20.9997 13.4999C20.9997 11.7097 20.2623 9.99287 18.9496 8.72704C17.6369 7.46122 15.8565 6.75143 14.0001 6.75143ZM14.0001 9.45134C14.558 9.44143 15.1123 9.53881 15.6307 9.73781C16.1491 9.93681 16.6212 10.2334 17.0194 10.6103C17.4176 10.9872 17.7339 11.4369 17.9499 11.933C18.1659 12.4291 18.2772 12.9618 18.2772 13.4998C18.2773 14.0379 18.1662 14.5706 17.9505 15.0668C17.7347 15.563 17.4185 16.0127 17.0204 16.3897C16.6224 16.7668 16.1504 17.0636 15.632 17.2627C15.1137 17.4619 14.5594 17.5594 14.0015 17.5497C12.8876 17.5497 11.8194 17.123 11.0318 16.3635C10.2442 15.604 9.80171 14.5739 9.80171 13.4999C9.80171 12.4258 10.2442 11.3957 11.0318 10.6362C11.8194 9.87667 12.8876 9.44999 14.0015 9.44999L14.0001 9.45134ZM21.3497 4.7265C20.8981 4.74393 20.471 4.9292 20.1578 5.24349C19.8447 5.55779 19.6698 5.97674 19.6698 6.41259C19.6698 6.84845 19.8447 7.26739 20.1578 7.58169C20.471 7.89599 20.8981 8.08125 21.3497 8.09869C21.8138 8.09869 22.2589 7.9209 22.5871 7.60444C22.9153 7.28799 23.0996 6.85878 23.0996 6.41124C23.0996 5.96371 22.9153 5.5345 22.5871 5.21804C22.2589 4.90158 21.8138 4.7238 21.3497 4.7238V4.7265Z"
                                    fill="#CCAE5D" />
                            </svg>
                        </span>
                        <span class="instagram_text">
                            Instagram Post
                        </span>
                    </div> -->
                </aside>
            </section>



            <section id="instagram_and_facebook_container">
                <p class="note">Note:&nbsp;To browse the posts,&nbsp;kindly hover over any one of our many posts and
                    scroll down or up using your trackpad or
                    mouse wheel in
                    your browser.
                    If you are on mobile, you can scroll through your finger by swiping left or right</p>
                <div id="facebook_post_container">

                </div>
                <!-- <div id="instagram_post_container"></div> -->
            </section>
        </div>

    </main>



    <?php
    include_once("/var/www/72-dragons-health-at-apha/view/footer.php");
    ?>
</body>
<script>
    $(document).ready(function () {
        function faceBook_instagram_post(id, url) {

            $.ajax({
                url: url,
                method: "GET",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    let data_post = data.posts;
                    let unique_date = new Set();
                    for (let i = 0; i < data_post.length; i++) {
                        unique_date.add(data_post[i].day);
                    }
                    let unique_date_array = [...unique_date];
                    console.log(unique_date_array);

                    for (let i = 0; i < unique_date_array.length; i++) {
                        let div_parent_cont_post = $('<div/>');
                        div_parent_cont_post.attr('class', 'postData_container');
                        let filter_data = data_post.filter((ele, idx) => ele.day === unique_date_array[i]);
                        console.table(filter_data);

                        //apaend all filter data
                        for (let k = 0; k < filter_data.length; k++) {
                            let create_div_for_every_post = $('<div/>');
                            create_div_for_every_post.attr('class', 'create_div_for_every_post');
                            create_div_for_every_post.css({
                                "padding": "0.5rem",
                                "display": "flex", "gap": "0.5rem",
                                "flex-direction": "column",
                                "align-items": "center",
                                "width": "289px", "height": "350px",
                                "border-radius": "15.265px",
                                "background": "rgba(125, 56, 54, 0.69)",
                                "transition": "all 0.5s"

                            })
                            create_div_for_every_post.on('mouseover', function () {
                                $(this).css({
                                    "background": "#A8944D",

                                })
                                $(this).find('.desc_for_post').css({
                                    "color": "#822826"
                                })
                            }).on('mouseleave', function () {
                                $(this).css({
                                    "background": "rgba(125, 56, 54, 0.69)",

                                })
                                $(this).find('.desc_for_post').css({
                                    "color": "#A8944D"
                                })
                            })

                            create_div_for_every_post.appendTo(div_parent_cont_post);

                            let media_of_post = $('<img alt="media post">');
                            media_of_post.attr('class', 'images_for_post')
                            media_of_post.css({
                                "width": "263.984px",
                                "object-fit": "cover",
                                "border-radius": "15.265px",
                                "background": "lightgray",
                            })
                            media_of_post.attr('src', filter_data[k].full_picture);
                            media_of_post.appendTo(create_div_for_every_post);

                            let desc_for_post = $('<p/>');
                            desc_for_post.attr('class', 'desc_for_post');
                            let message_one = filter_data[k].message.split(',').shift();


                            desc_for_post.text(message_one);
                            desc_for_post.appendTo(create_div_for_every_post);
                        }

                        let day_bro = $('<p/>');
                        day_bro.css({
                            "z-index": "20",

                            "border-radius": "5px",
                            "background": "linear-gradient(270deg, #A8944D 0%, #E8DDB5 106.23%)",
                            "display": "flex", "justify-content": "center", "align-items": "center",
                            "color": "#822826",
                            "font-family": "Montserrat",
                            // "font-size": "18px",
                            "font-style": "normal",
                            "font-weight": "700",
                            "line-height": "normal", "position": "absolute", "bottom": "-17px", "right": "-19px", "padding": "0.5rem"
                        })
                        day_bro.text("day" + " " + unique_date_array[i]);
                        day_bro.appendTo(div_parent_cont_post)

                        div_parent_cont_post.appendTo(id);



                    }
                },
                error: function (e) {

                }

            })
        }

        faceBook_instagram_post('#facebook_post_container', "/php/api/health_facebook_posts_api.php")
        // faceBook_instagram_post('#instagram_post_container', "/php/api/health_instagram_posts_api.php")

        //mouse wheel
        $('#facebook_post_container').on('mousewheel', function (e) {
            var delta = e.originalEvent.wheelDelta;
            var scrollAmount = 20; // Number of pixels to scroll

            if (delta > 0) {
                // Scroll left
                var currentScrollLeft = $(this).scrollLeft();
                $(this).scrollLeft(currentScrollLeft - scrollAmount);
            } else {
                // Scroll right
                var currentScrollLeft = $(this).scrollLeft();
                $(this).scrollLeft(currentScrollLeft + scrollAmount);
            }

            e.preventDefault(); // Prevent the default scroll behavior
        });

        // $('#instagram_post_container').on('mousewheel', function (e) {
        //     var delta = e.originalEvent.wheelDelta;
        //     var scrollAmount = 20; // Number of pixels to scroll

        //     if (delta > 0) {
        //         // Scroll left
        //         var currentScrollLeft = $(this).scrollLeft();
        //         $(this).scrollLeft(currentScrollLeft - scrollAmount);
        //     } else {
        //         // Scroll right
        //         var currentScrollLeft = $(this).scrollLeft();
        //         $(this).scrollLeft(currentScrollLeft + scrollAmount);
        //     }

        //     e.preventDefault(); // Prevent the default scroll behavior
        // });

    })
</script>

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

</html>