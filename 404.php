<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Listing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/twaproject/views/css/global.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<header>

</header>

<body>
  <!-- Nav Bar Code -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">[Icon TBA]</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/twaproject/views/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/twaproject/listings/list/">Listing</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <!-- TBA: Change "Account" to an icon -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end" style="width:300px; padding: 15px; padding-bottom: 10px;">
              <!-- TBA: Have My Account button be disabled when there is no session -->
              <div class="d-grid gap-2">
              <a href="account.html" class="btn btn-success" type="button" name="account">My Account</a>
              </div>
              <div class="dropdown-divider"></div>
              <form class="form-horizontal" method="post" accept-charset="UTF-8">
                <input class="form-control login" type="text" name="username" placeholder="Username"><br>
                <input class="form-control login" type="password" name="password" placeholder="Password"><br>
                <!-- TBA: Center buttons -->
                <input class="btn btn-primary" type="submit" name="submit" value="Login">
                <a href="/twaproject/users/create/" class="btn btn-primary" type="button" name="register">Register</a>
                <a href="/twaproject/logout/" class="btn btn-danger" type="button" name="logout">Logout</a>
              </form>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <!-- Page Body -->
  <div class="wrapper">
    <h1>404 - Page Not Found</h1>
    <p>Please check the URL and try again.</p>
</div>
<!-- Logging 404 error -->
<?php
require((__DIR__)."/logging/autoload.php");
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
$log = new Logger('mylog');
$log->pushHandler(new StreamHandler((__DIR__)."/logging/mylogfile.log", Logger::INFO));
$log->error("User reached a 404.");
?>
  <!-- Register Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
      </div>
      <!-- TBA: Add alert when register fails due to existing username/missing fields -->
      <div class="modal-body">
        <form class="form-horizontal" method="post" accept-charset="UTF-8">
          <input class="form-control login" type="text" name="username" placeholder="Username"><br>
          <input class="form-control login" type="password" name="password" placeholder="Password"><br>
          <input class="form-control login" type="email" name="email" placeholder="Email"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Register</button></form>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

</body>
<footer></footer>

