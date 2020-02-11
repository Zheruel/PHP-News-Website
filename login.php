<?php
include "connect.php";
if(isset($_POST["username"]) && isset($_POST["pass"])){
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $stmt = $dbc->prepare("SELECT * FROM korisnik WHERE korisnicko_ime = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    $pass_hashed = $row["lozinka"];
    $razina_prava = $row["razina"];
    $logged = 0;
    if(password_verify($password, $pass_hashed)){
        $logged = 1;
        session_start();
        $_SESSION["user"] = $username;
        $_SESSION["razina_prava"] = $razina_prava;
        header('Location: index.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>TVZ News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center bg-primary" style="margin-bottom:0">
  <h1 class="text-white"><img src="images/tvz-logo.svg" class="img-fluid" alt="Responsive image"> Vijesti</h1>
  <br>
  <h5 class="text-white">Dobrodosli na stranicu koja prati aktualne vijesti TVZ-a</h5> 
</div>

<nav class="navbar navbar-expand-sm bg-dark justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white" href="kategorija.php?id=Zabava">Zabava</a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white" href="kategorija.php?id=Ozbiljno">Ozbiljno</a>
      </li>
      <?php
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
              $user = $_SESSION["user"];
              if($_SESSION["razina_prava"] == 1){
                echo("
                <li class='nav-item'>
                <a class='nav-link text-white' href='administracija.php'>Adminin panel</a>
                </li>
                ");
              }
              echo("
              <li class='nav-item'>
              <a class='nav-link text-white' href='unos.php'>Unos</a>
              </li>
              <li class='nav-item'>
              <a class='nav-link text-white' href='logoff.php'>Prijavljeni ste kao $user kliknite ovdje za odjavu</a>
              </li>
              ");
           }
           else{
            echo("
            <li class='nav-item'>
              <a class='nav-link text-white' href='login.php'>Prijava</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link text-white' href='register.php'>Registracija</a>
            </li>
            ");
          }
       ?>
      
      
    </ul>
</nav>

<div class="container-fluid text-center" style="margin-top: 30px;margin-bottom: 162px;">
<?php
          if(isset($_POST["username"]) && isset($_POST["pass"])){
            if($logged == 1){
              echo("
              <div class='container-flud text-center text-success'>
                Uspjeli ste se ulogirati!
              </div>
              ");
            }
          }
          ?>
<?php
          if(isset($_POST["username"]) && isset($_POST["pass"])){
            if($logged == 0){
              echo("
              <div class='container-flud text-center text-danger'>
                Login nije uspio!
              </div>
              ");
            }
          }
          ?>
        <div class="row content">
          <div class="col-sm-2 sidenav"></div>
          <div class="col-sm-8 text-left">
            <form action="login.php" method="POST">     
                <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                  <label for="naslov">Password:</label>
                  <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
              </form>
          </div>
          <div class="col-sm-2 sidenav"></div>
        </div>
</div>

</div>

<div class="jumbotron text-center bg-primary" style="margin-bottom:0">
  <p class="text-white">Tin Zeljar - 2019 - tzeljar@tvz.hr</p>
</div>

</body>