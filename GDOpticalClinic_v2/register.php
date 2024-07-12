<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once "db.php";


    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact_number"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $account_type = $_POST["role"]; 


    $sql = "INSERT INTO accounts (username, password, fullname, gender, birthdate, address, contact_number, account_type) 
            VALUES ('$username', '$password', '$fullname', '$gender', '$birthdate', '$address', '$contact_number', '$account_type')";

    if (mysqli_query($conn, $sql)) {
        $success_message = "User added successfully.";
    } else {
        $error_message = "Error: " . mysqli_error($conn);
    }


    mysqli_close($conn);


    header("Location: add_user_secretary.php?success_message=" . urlencode($success_message) . "&error_message=" . urlencode($error_message));
    exit();
}
