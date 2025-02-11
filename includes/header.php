<?php 
session_start();
/**
 * This is the header file for the grades and index page
 *
 *This file has the banner that will display on both pages. It has a css link obtained from bootstrap as instructed. It
 *also has style tags for overriding some of the bootstrap styles
 * 
 * PHP version 8.1
 *
 * @author Edwinah Lynn Ninsiima <edwinahlynn.ninsiima@dcmail.ca>

 * @version 1.0 (November, 11, 2024)
 */ 
  
  //ob_start();
  
  if (isset($_SESSION['user'])){
    $action = "grades portal";
    $action2 = "logout";
    $link1="./grades.php";
    $link2="./logout.php";
  }
  else{
    $action = "login";
    $action2 = "Register";
    $link1="./login.php";
    $link2="./register.php";
  }
  require("functions.php");
  
?>
<!DOCTYPE html>
<html lang="en" class="p-3 mb-2 bg-secondary text-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!--
        Name: <?php echo $name."\n"; ?>
        File: <?php echo "$file \n"; ?>
        Description: <?php echo $description."\n"; ?>
        Date: <?php echo $date."\n"; ?>

-->
    <style>
        .bg-dark-blue {
            background-color: #1e3a8a;
        }
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h1 class = "p-1 mb-0  bg-secondary text-white"><?php echo $banner; ?></h1>
<nav class="navbar navbar-expand-lg text-light navbar-light bg-dark-blue ">
  <div class="container-fluid">
    <a class="navbar-brand text-reset" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link active text-reset" aria-current="page" href="./index.php">Homepage</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-reset"  href=<?php echo $link1?>><?php echo $action; ?></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-reset" href=<?php echo $link2?>><?php echo $action2; ?></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-reset" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>