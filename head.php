<?php
session_start();
$db = 'les';
$user = 'les';
$password = 'les';

$dsn = 'mysql:host=localhost;port=3306;dbname=' . $db;
$con = new PDO($dsn, $user, $password);


// print_r($result);

//inlog checken!!
if (isset($_POST['knop'])) {
    $stmt = $con->prepare("select * from users where naam = :naam");
    $stmt->execute(['naam' => $_POST['naam']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $result['naam'];
    $password = $result['password'];
    if ($_POST['naam'] == $username && $_POST['password'] == $password) {
        $_SESSION['user'] = [$_POST['naam'], $_POST['password']];
    }
} else if (!isset($_SESSION['user']) && $_SERVER['PHP_SELF'] != "/index.php") {
    header('Location: /index.php');
}

if (isset($_GET['logout']) && $_GET['logout'] == "true") {
    //we gaan uitloggen
    $_SESSION = [];
    session_destroy();
}

function checklink($pag)
{
    if ($_SERVER['PHP_SELF'] == $pag) {
        $class = "active";
    } else {
        $class = "inactive";
    }
    return $class;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <div id="logo"></div>
            <ul>
                <li><a href="index.php" class="<?= checklink('/index.php') ?>">Home</a></li>
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="contact.php" class="<?= checklink('/contact.php') ?>">Contact</a></li>
                    <li><a href="about.php" class="<?= checklink('/about.php') ?>">About</a></li>
                    <li><a href="index.php?logout=true" class="inactive">Logout</a></li>
                    <li><?= $_SESSION['user'][0]; ?></li>
                <?php } ?>
            </ul>

        </nav>
    </header>
    <div id="wrapper">
        <main>