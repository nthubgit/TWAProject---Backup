<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>My Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/twaproject/views/css/global.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <!-- Datatable CSS -->
            <link href='/twaproject/views/DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<!-- <script src="jquery-3.3.1.min.js"></script> -->

<script language="JavaScript" type="text/javascript" src="/twaproject/views/jquery-3.3.1.min.js"></script>

<!-- Datatable JS -->
<script language="JavaScript" type="text/javascript" src="/twaproject/views/DataTables/datatables.min.js"></script>
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
            <a class="nav-link" aria-current="page" href="/twaproject/listings/create/">Submit</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <!-- TBA: Change "Account" to an icon -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <!-- My Submissions: Will show all of the user's submissions. -->
    <div class="wrapper">
    <!-- Table -->
    <h1>Manage My Submissions</h1>
    <table id='listingTable' class='table table-striped justify-content-center'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Added By</th>
            <th>Date Added</th>
            <th>Image URL</th>
            <th>Option</th>
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
            'url':'/twaproject/views/ajaxfile2.php'
        },
        'columns': [
            { data: 'id' },
            { data: 'name' },
            { data: 'addedby' },
            { data: 'dateadded' },
            { data: 'imageurl' },
            {
                defaultContent: '<button class="btn btn-primary">Edit</button>',
            },
        ]
    });
    $('#example tbody').on('click', 'button', function () {
        var data = table.row($(this).parents('tr')).data();
        alert("Not implemented");
    });
});


</script>
      
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

</body>
<footer></footer>