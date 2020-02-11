<?php
include "connect.php";
if(isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["username"]) && isset($_POST["pass1"]) && isset($_POST["pass2"])){
  $ime = $_POST["ime"];
  $prezime = $_POST["prezime"];
  $korisnicko_ime = $_POST["username"];
  $pass1 = $_POST["pass1"];
  $pass2 = $_POST["pass2"];
  $stmt = $dbc->prepare("SELECT * FROM korisnik WHERE korisnicko_ime = ?");
  $stmt->bind_param("s", $korisnicko_ime);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = mysqli_fetch_array($result);
  $kime = $row["korisnicko_ime"];
  $registered = 0;
  if($korisnicko_ime != $kime && $pass1 == $pass2){
    $registered = 1;
    if(isset($_POST['checkbox'])){
      $razina = 1;
    }
    else{
      $razina = 0;
    }
    $pass_encrypted = password_hash($pass1, CRYPT_BLOWFISH);
    $stmt = $dbc->prepare("INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $ime, $prezime, $korisnicko_ime, $pass_encrypted, $razina);
    $stmt->execute();
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

<div class="container-fluid text-center" style="margin-top: 30px;margin-bottom: 50px;">
<?php
          if(isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["username"]) && isset($_POST["pass1"]) && isset($_POST["pass2"])){
            if($pass1 != $pass2){
              echo("
              <div class='container-flud text-center text-danger'>
                Passwordi se ne smiju razlikovati!
              </div>
              ");
            }
          }
          ?>
<?php
          if(isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["username"]) && isset($_POST["pass1"]) && isset($_POST["pass2"])){
            if($korisnicko_ime == $kime){
              echo("
              <div class='container-flud text-center text-danger'>
                Korisnicko ime je zauzeto!
              </div>
              ");
            }
          }
          ?>
<?php
          if(isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["username"]) && isset($_POST["pass1"]) && isset($_POST["pass2"])){
            if($registered == 1){
              echo("
              <div class='container-flud text-center text-success'>
                Korisnik je uspjesno registriran!
              </div>
              ");
            }
          }
          ?> 
        <div class="row content">
          <div class="col-sm-2 sidenav"></div>
          <div class="col-sm-8 text-left">
            <form action="register.php" method="POST">
                <div class="form-group">
                  <label for="username">Ime:</label>
                  <input type="text" class="form-control" id="ime" name="ime" required>
                </div>
                <div class="form-group">
                  <label for="username">Prezime:</label>
                  <input type="text" class="form-control" id="prezime" name="prezime" required>
                </div>
                <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                  <label for="naslov">Password:</label>
                  <input type="password" class="form-control" id="pass1" name="pass1" required>
                </div>
                <div class="form-group">
                  <label for="naslov">Repeat password:</label>
                  <input type="password" class="form-control" id="pass2" name="pass2" required>
                </div>
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' name='checkbox'>
                    <label class='form-check-label' for='defaultCheck1'>
                    Korisnik je administraror:
                    </label>
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