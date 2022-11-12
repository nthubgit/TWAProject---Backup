<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Listing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/twaproject/views/css/global.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <head>
        <title>Datatable AJAX pagination with PHP and PDO</title>
        <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- jQuery Library -->
        <script src="jquery-3.3.1.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>
        
    </head>
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
            <a class="nav-link active" aria-current="page" href="/twaproject/listings/list/">Listing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/twaproject/listings/create/">Submit</a>
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
  <!-- <div class="wrapper">
    <h1>Search Submissions</h1>
    <form action="">
      <div class="mb-3">
        <label for="searchbar" class="form-label">Enter your query</label>
        <input type="text" class="form-control" id="searchbar">
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" value="name" id="checkName" name="searchTerm" checked>
        <label class="form-check-label" for="checkName">
          Name
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" value="user" id="checkUser" name="searchTerm">
        <label class="form-check-label" for="checkUser">
          User
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" value="desc" id="checkDescription" name="searchTerm">
        <label class="form-check-label" for="checkDescription">
          Description
        </label>
      </div>
      <br>
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="button">Search</button>
      </div>
  </div>
  </form> -->
  <br>
    <?php
    
        class ListingsView{

          public $data;

          function __construct($data){

            $this->data = $data;

            $this->render();

          }

          function render(){

            $html = '<div class="wrapper">';
            $html .= "";
    
            echo $html;
    
          }

        }
    ?>
    <div class="wrapper">
    <!-- Table -->
    <h1>Search Submissions</h1>
    <table id='listingTable' class='table table-striped justify-content-center'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Added By</th>
            <th>Date Added</th>
            <th>Image URL</th>
        </tr>
        </thead>
        
    </table>
</div>

<!-- Script -->
<script>
$(document).ready(function(){
    $('#listingTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'ajaxfile.php'
        },
        'columns': [
            { data: 'id' },
            { data: 'name' },
            { data: 'addedby' },
            { data: 'dateadded' },
            { data: 'imageurl' },

        ]
    });
});
</script>

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

