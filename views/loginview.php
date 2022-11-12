<!-- Global TBA:
1. Change all HTML files to PHP when implementing backend 
2. Add more pages now that Login/Register are no longer individual pages -->

<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Login</title>
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
    <h1>Login</h1>
  <form class="form-horizontal" method="post" accept-charset="UTF-8">
          <input class="form-control login" type="text" name="username" placeholder="Username"><br>
          <input class="form-control login" type="password" name="password" placeholder="Password"><br>
        <button type="submit" class="btn btn-primary">Login</button></form>
    
        <?php


class LoginView{
    
    private $html;

    private $loginMessage;

    function __construct($loginMessage){

        $this->loginMessage = $loginMessage;

        $this->render();

    }

    function render(){


        echo "<br>";
        echo $this->loginMessage;
        echo "</div>";

    }

}
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

    </body>
</html>