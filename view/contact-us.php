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
    <link rel="stylesheet" href="/css/video_gallery.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/js/header.js" defer></script>
    <title>contact-us</title>
    <style>
        /* html {
            background: linear-gradient(180deg, #121212 0%, #702020 111.22%);
            height: 100%;
            background-size: cover;

        } */

        /* body {
            background: linear-gradient(180deg, #121212 0%, #702020 111.22%);
            background-repeat: no-repeat;

        } */

        main {
            padding: 3rem;
        }

        #section_container {
            display: flex;
            gap: 1rem;
            justify-content: space-between;
        }

        .contactInformation_container {
            width: 410.713px;
            height: 514px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2.5rem;
            border-radius: 20px;
            border-radius: 10px;
            background: linear-gradient(270deg, #FADA69 0%, #847338 102.34%, #000 106.23%);
            padding: 2rem;
        }

        .information_holder_one p:first-child {
            color: #000;
            font-family: Fraunces;
            font-size: 28px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;


        }

        .information_holder_one p:last-child {
            color: #822826;
            font-family: Montserrat;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;


        }

        .information_holder_two {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 1.5rem;
        }

        .information_holder_two .data_address {
            display: flex;
            gap: 1rem;
            position: relative;
            right: 2.5rem;



        }



        .information_holder_two .data_address p {
            color: #822826;
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            position: relative;
            bottom: 0.2rem;
        }

        #form_field_container {
            display: flex;
            flex-direction: column;
            gap: 3.3rem;
            color: #A8944D;
            font-family: Montserrat;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: 21px;

            padding-left: 2rem;
            /* 131.25% */
        }

        #nameAndLastName_container,
        #emailAndNumber_container {
            display: flex;
            gap: 1.5rem;

        }



        #emailAndNumber_container .email_field {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        #emailAndNumber_container .contact_field {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            position: relative;
            left: 6.5rem;
        }

        #nameAndLastName_container .name_field {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        #nameAndLastName_container .lastname_field {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            position: relative;
            left: 6.5rem;
        }

        #form_field_container .subject_field {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;

        }

        #form_field_container .subject_field input,
        #form_field_container .message_field input {
            width: 154%;
        }

        #form_field_container .message_field {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;


        }

        #form_field_container input[type] {
            background-color: rgba(26, 0, 1, 0);
        }

        #form_field_container input {
            color: #A8944D;
            outline: none;


            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid #A8944D;
            width: 150%;
        }

        #form_field_container #submit_message {
            /* color: #822826;
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            padding: 13.65px 28px;
            border-radius: 20px;
            background: linear-gradient(270deg, #A8944D 0%, #E8DDB5 106.23%);
            width: 13rem;
            height: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            left: 25.5rem; */
            color: #822826;
            font-family: Fraunces;
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            display: flex;
            width: 185px;
            height: 48px;
            padding: 13px 17.5px;
            justify-content: center;
            align-items: center;
            gap: 5px;
            flex-shrink: 0;
            border-radius: 10px;
            background: linear-gradient(270deg, #A8944D 0%, #E8DDB5 106.23%);
            border: none;
            align-self: self-end;
            position: relative;
            left: 11.6rem;
        }

        #form_field_container .message_field input[placeholder] {
            color: #8D8D8D;
            font-family: Helvetica;
            font-size: 14px;
            opacity: 0.5;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            padding-bottom: 0.5rem;

            /* 142.857% */
        }

        ::placeholder {
            text-align: left;
        }

        #form_field_container .message_field input[placeholder]:focus {
            opacity: 1;
        }




        @media screen and (max-width:1110px) {
            #emailAndNumber_container .contact_field {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                position: relative;
                left: 2rem;
            }



            #nameAndLastName_container .lastname_field {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                position: relative;
                left: 2rem;
            }

            #form_field_container .subject_field input,
            #form_field_container .message_field input {
                width: 120%;
            }

            #form_field_container input {
                width: 116%;
            }

            #section_container {
                display: flex;
                flex-direction: column;

                align-items: center;
            }

            #form_field_container {
                display: flex;
                flex-direction: column;
                gap: 3.3rem;
                color: #A8944D;
                font-family: Montserrat;
                font-size: 16px;
                font-style: normal;
                font-weight: 700;
                line-height: 21px;
                position: relative;
                right: 2.5rem;

                /* 131.25% */
            }

            #form_field_container #submit_message {
                align-self: flex-start;
            }
        }

        @media screen and (max-width:417px) {
            #form_field_container {
                font-size: 12px !important;
            }

            .contactInformation_container {
                width: 300px !important;
                height: 406px !important;
            }

            .information_holder_one p:first-child {
                font-size: 20px !important;
            }

            .information_holder_one p:last-child {
                font-size: 13px;
            }

            .information_holder_two .data_address {
                right: 0;
            }

            #form_field_container #submit_message {
                width: 161px !important;
                font-size: 12px !important;
                height: 40px !important;
                left: 0.5rem !important;
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
            <section id="form_container">

                <div id="form_field_container">

                    <div id="nameAndLastName_container">
                        <div class="name_field">
                            <label>First Name </label>
                            <input type="text" id="fname">
                        </div>
                        <div class="lastname_field">
                            <label>Last Name </label>
                            <input type="text" id="lname">
                        </div>
                    </div>

                    <div id="emailAndNumber_container">
                        <div class="email_field">
                            <label>Email </label>
                            <input type="email" id="emailData">
                        </div>
                        <div class="contact_field">
                            <label>Contact Number </label>
                            <input type="tel" id="mobile_num">
                        </div>
                    </div>

                    <div class="subject_field">
                        <label>Subject</label>
                        <input type="text" id="subject_data">
                    </div>

                    <div class="message_field">
                        <label>Message</label>
                        <input type="text" placeholder="Write your message.." id="message_data">
                    </div>

                    <button id="submit_message">Send Message</button>
                </div>

            </section>
            <section id="information_container">
                <div class="contactInformation_container">
                    <div class="information_holder_one">
                        <p>Contact Information</p>
                        <p>Reach out to us for our services!</p>
                    </div>
                    <div class="information_holder_two">
                        <div class="data_phone">

                        </div>
                        <div class="data_email">

                        </div>
                        <div class="data_address">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="17" viewBox="0 0 21 17"
                                    fill="none">
                                    <path
                                        d="M20.25 0.0991211H0.25V16.0991H20.25V0.0991211ZM18.25 4.09912L10.25 9.09912L2.25 4.09912V2.09912L10.25 7.09912L18.25 2.09912V4.09912Z"
                                        fill="#822826" />
                                </svg>
                            </span>
                            <p>info@72dragons.com</p>
                        </div>
                        <div class="data_address_two">

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php
    include_once("/var/www/72-dragons-health-at-apha/view/footer.php");
    ?>
</body>
<script>
    $(document).ready(function () {


        //submitting form
        $('#submit_message').on('click', function () {
            let firstName = $('#fname').val();
            let lastname = $('#lname').val();
            let email_data = $('#emailData').val();
            let mobile_number = $('#mobile_num').val();
            let subject_data = $('#subject_data').val();
            let message_data = $('#message_data').val();


            let regex = /^([a-zA-Z]{2,50})$/;
            let regex_mobile = /^([0-9]{5,20})$/;

            let regex_for_subject = /^([a-zA-Z0-9\s.,]{2,200})$/;
            let regex_for_message = /^[\w\s,.?]{2,1000}$/;


            let regexEmail = /^([a-zA-Z0-9\.-]+)@([a-z0-9]{2,100}).([a-z]{2,20})$/;
            if (!regex.test(firstName)) {

                alert('please enter your first name');
                $('#fname').val('');
                return;
            }
            else {
                if (!regex.test(lastname)) {
                    alert("please enter your last name");
                    $('#lname').val('');
                    return;
                } else {

                    if (!regexEmail.test(email_data)) {
                        alert('Please enter in the correct email format: name@email.com');
                        $('#emailData').val('');
                        return;
                    }
                    else {
                        console.log("email matched");
                        if (!regex_mobile.test(mobile_number)) {
                            alert('please enter your correct mobile number');
                            $('#mobile_num').val('');
                            return;
                        }
                        else {
                            console.log(' mobile number matched');
                            if (!regex_for_subject.test(subject_data)) {
                                alert('please enter your subject');
                                $('#subject_data').val('');
                                return;
                            }
                            else {

                                if (!regex_for_message.test(message_data)) {
                                    alert('please enter your message');
                                    $('#message_data').val('');
                                    return;
                                }
                                else {
                                    // console.log(firstName + " " + lastname + " " + subject_data + " " + email_data + " " + mobile_number + " " + message_data);
                                    $.ajax({
                                        url: "/php/api/contact_us_form_submit_api.php",
                                        method: "POST",
                                        data: {
                                            firstName: firstName,
                                            lastName: lastname,
                                            email: email_data,
                                            contactNo: mobile_number,
                                            selectSubject: subject_data,
                                            message: message_data

                                        },
                                        success: function (data) {

                                            if (data) {
                                                alert('Thank you for reaching out to us! We will review your message and get back to you.');
                                            }
                                            window.location.reload(); // Corrected the reload function
                                        },
                                        error: function (e) {
                                            // Handle errors here
                                            console.log(e)
                                        }
                                    });
                                }

                            }


                        }

                    }

                }
            }






        })





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