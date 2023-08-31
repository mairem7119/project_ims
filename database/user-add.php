<?php
session_start();
$table_name = $_SESSION['table'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted = password_hash($password, PASSWORD_DEFAULT);

    $data = [];
    $errors = [];
    if (empty($first_name)) {
        $errors['first_name'] = "First name is required";
    } else {
        $data['first_name'] = $first_name;
    }
    if (empty($last_name)) {
        $errors['last_name'] = "Last name is required";
    } else {
        $data['last_name'] = $last_name;
    }
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email is not valid";
    } else {
        $data['email'] = $email;
    }
    if (empty($password)) {
        $errors['password'] = "Password is required";
    } else {
        $data['password'] = $password;
    }
}
$_SESSION['errors'] = $errors;
$_SESSION['data'] = $data;
if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
    try {
        $command = "INSERT INTO $table_name(first_name, last_name, email, password, created_at, updated_at) 
            VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $encrypted . "', NOW(), NOW())";

        include('connection.php');
        $conn->exec($command);

        $response = [
            'success' => true,
            'message' => $first_name . ' ' . $last_name . ' successfully added to the system',
        ];
    } catch (\PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage(),
        ];
    }
}
$_SESSION['response'] = $response;
header('Location: ../register.php');
