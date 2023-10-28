<?php
require '/var/www/heroes-of-public-health/php/db/db_class.php';

// Connect to the database
db::connect();

$errors = [];

$requiredFields = ['firstName', 'lastName', 'email', 'contactNo', 'selectSubject', 'message'];

foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $errors[] = "The '$field' field is required.";
    }
}

// Validate first name
$firstName = $_POST['firstName'];
if (empty($firstName) || !preg_match("/^[a-zA-Z\s]+$/", $firstName)) {
    $errors[] = "Invalid first name. Please provide a valid name.";
}

// Validate last name
$lastName = $_POST['lastName'];
if (empty($lastName) || !preg_match("/^[a-zA-Z\s]+$/", $lastName)) {
    $errors[] = "Invalid last name. Please provide a valid name.";
}

// Validate email
$email = $_POST['email'];
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email. Please provide a valid email address.";
}

// Validate contact number
$contactNo = $_POST['contactNo'];
if (empty($contactNo) || !preg_match("/^[0-9+\s-]+$/", $contactNo)) {
    $errors[] = "Invalid contact number. Please provide a valid number.";
}

// Check for spam keywords in the message
$spamKeywords = array(
    "cialis",
        "lottery",
        "free money",
        "online pharmacy",
        "get rich quick",
        "nigerian prince",
        "inheritance",
        "cheap medications",
        "lose weight fast",
        "meet singles",
        "earn money from home",
        "credit card offers",
        "exclusive deal",
        "call now",
        "no obligation",
        "money-back guarantee",
        "limited time offer",
        "one-time investment",
        "double your income",
        "click below",
        "bonus",
        "cash",
        "viagra",
        "guarantee",
        "prize",
        "urgent",
        "win",
        "earn",
        "instant",
        "income",
        "million dollars",
        "debt",
        "free gift",
        "no catch",
        "buy direct",
        "reverses",
        "100% satisfied",
        "as seen on",
        "billion",
        "consolidate debt",
        "home based",
        "offer",
        "performance",
        "refund",
        "risk-free",
        "satisfaction",
        "save big money",
        "special promotion",
        "this won't believe",
        "winner",
);

$message = $_POST['message'];
foreach ($spamKeywords as $keyword) {
    if (stripos($message, $keyword) !== false) {
        $errors[] = "We have detected your message to be possible spam, if you do not believe this to be correct, please reach out via the email in the sidebar to send your message.";
        break; // Exit loop on the first spam keyword found
    }
}

$website_value = 2; // Constant value for health at apha

if (empty($errors)) {
    $inquiryType = $_POST['selectSubject'];
    $message = $_POST['message'];

    // Insert data into the contactUs table with the current timestamp
    $query = "INSERT INTO apha_web.contactUs (id, firstName, lastName, email, contactNo, inquiryType, message, website_value, uploadTime) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
    $stmt = db::get_connection()->prepare($query);
    $stmt->bind_param("ssssssd", $firstName, $lastName, $email, $contactNo, $inquiryType, $message, $website_value);

    if ($stmt->execute()) {
        $response = ['message' => 'Form submitted successfully.'];
        echo json_encode($response);
    } else {
        $response = ['error' => 'Error inserting data into the database.'];
        echo json_encode($response);
    }

    // Close the prepared statement
    $stmt->close();
} else {
    $response = ['errors' => $errors];
    echo json_encode($response);
}

// Disconnect from the database
db::disconnect();
?>
