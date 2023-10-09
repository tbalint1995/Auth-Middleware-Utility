<?php

session_start();

function checkAccess()
{
    if (!isset($_SESSION['member'])) {
        header("Location: login.php");
        exit();
    }
}

function login($username, $password)
{
    $mysqli = new mysqli('localhost', 'root', '', 'prioris');

    $sql = "SELECT username, password FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($dbUsername, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $dbPassword)) {
        $_SESSION['member'] = $username;
        header("Location: protected.php");
        exit();
    } else {
        return "Hibás felhasználónév vagy jelszó.";
    }
}

function logout()
{
    unset($_SESSION['member']);
    header("Location: index.php");
    exit();
}
