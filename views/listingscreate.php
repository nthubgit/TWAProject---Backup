<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Submit an Image</title>
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
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/twaproject/listings/create/">Submit</a>
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
                <a href="/TWAProject/users/list/" class="btn btn-success" type="button" name="account">My Account</a>
                </div>
              <div class="dropdown-divider"></div>
              <form class="form-horizontal" method="post" accept-charset="UTF-8">
                <!-- TBA: Center buttons -->
                <a href="/twaproject/login/view/" class="btn btn-primary" type="button" name="login">Login</a>
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
  <h1>Submit an Image</h1>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="submitName" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        <label for="submitName" class="form-label">Added By</label>
        <input type="text" class="form-control" id="addedby" name="addedby" placeholder="1">
        <label for="submitName" class="form-label">Date Added</label>
        <input type="text" class="form-control" id="dateadded" name="dateadded">
      </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
      </div>
      <div class="d-grid gap-2">
      <input type=submit class="btn btn-primary" type="submit" name="submit" value="Submit">
    </div>
  </form>

  <!-- Script for adding some fields to the form. There are definitely better ways to do this,
  but for debugging visability it is good to see what is inputted. -->
  <script>
    var date = new Date().toISOString().substring(0, 10),
        field = document.querySelector('#dateadded');
    field.value = date;
    document.writeln(field.value);
  </script>


<!--Handle the uploaded file-->
<?php

class ListingsCreate {
  
    function __construct($data){

        // In our case $data for the create function is the number of rows affected / created
        $this->render($data);

      }       

    function render($data){

    if(isset($_POST) && !empty($_POST)){
        if($data > 0){
          $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

              echo "The user was successfully created.";

          }else{

              echo "There was an error creating the user.";

          }
      }

}         

}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

</body>
<footer></footer>

</html>
