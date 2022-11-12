<!-- Global TBA:
1. Change all HTML files to PHP when implementing backend 
2. Add more pages now that Login/Register are no longer individual pages -->

<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/global.css">
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
            <a class="nav-link active" href="/twaproject/views/">Home</a>
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
    <h1>News</h1>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum
    dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>
  <br>
  <div class="wrapper">
    <!-- Latest Submissions: Will show the newest 3 submissions, sorted by date. -->
    <h1>Latest Submissions</h1>
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
    //     'processing': true,
    //     'serverSide': true,
    //     'serverMethod': 'post',
    //     'ajax': {
    //         'url':'/twaproject/views/ajaxfile3.php'
    //     },
    //     'columns': [
    //         { data: 'id' },
    //         { data: 'name' },
    //         { data: 'addedby' },
    //         { data: 'dateadded' },
    //         { data: 'imageurl' },

    //     ]
    });
});
</script>
  <!-- Register Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        </div>
        <!-- TBA: Add alert when register fails due to existing username/missing fields -->
        <div class="modal-body">
          <form class="form-horizontal" method="post" accept-charset="UTF-8">
            <input class="form-control login" type="email" name="regEmail" placeholder="Email"><br>
            <input class="form-control login" type="text" name="regUsername" placeholder="Username"><br>
            <input class="form-control login" type="password" name="regPassword" placeholder="Password"><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Register</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

</body>
<footer></footer>