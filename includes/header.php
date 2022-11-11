<?php
//This inludes the session file. This file contains code that starts/resumes a session.
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page accross the website.
include_once 'includes/session.php'?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
    crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" href="CSS/site.CSS"/>

    <title>Attendance -<?php echo $title?></title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">IT Conference</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
          data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container" id="navbarNavAltMarkup">
          <div class="navbar-nav me-auto mb-2 mb-lg-0">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="viewrecords.php">View Attendees</a>
          </div>
              <div class="navbar-nav mr-auto mb-2 mb-lg-0">
            <?php
              if(!isset($_SESSION['user_id'])){
            ?>
              <a class="nav-link active" aria-current="page" href="login.php">Login</a>
            <?php } else { ?>
              <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only"> (current)</span></a>
              <a class="nav-item nav-link active" aria-current="page" href="logout.php">Logout <span class="sr-only">(current)</span></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">

    <br/>
  