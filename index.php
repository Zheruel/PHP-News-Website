<?php
include "connect.php";
$query1 = "SELECT * FROM clanak WHERE kategorija = 'Zabava' AND arhiva = 0 LIMIT 3";
$query2 = "SELECT * FROM clanak WHERE kategorija = 'Ozbiljno' AND arhiva = 0 LIMIT 3";
$result1 = mysqli_query($dbc, $query1) or die("Query 1 failed");
$result2 = mysqli_query($dbc, $query2) or die("Query 2 failed");
session_start();
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
  <style></style>
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

<div class="container" style="margin-top:30px">
  <h1>Zabava</h1>
  <div class="row">
    <?php
    while($row = mysqli_fetch_array($result1)){
      $naslov = $row['naslov'];
      $slika = $row['slika'];
      $tekst = $row['sazetak'];
      $id = $row['id'];
      echo("
      <div class='col-sm-4'>
      <a href='article.php?id=$id'><h5>$naslov</h5></a>
      <img src='$slika' class='img-fluid' alt='Responsive image'>
      <p>$tekst</p>
      </div>
      ");
    }
    ?>
  </div>

  <h1>Ozbiljno</h1>
  <div class="row">
  <?php
    while($row = mysqli_fetch_array($result2)){
      $naslov = $row['naslov'];
      $slika = $row['slika'];
      $tekst = $row['sazetak'];
      $id = $row['id'];
      echo("
      <div class='col-sm-4'>
      <a href='article.php?id=$id'><h5>$naslov</h5></a>
      <img src='$slika' class='img-fluid' alt='Responsive image'>
      <p>$tekst</p>
      </div>
      ");
    }
    ?>
  </div>

</div>

<div class="jumbotron text-center bg-primary" style="margin-bottom:0">
  <p class="text-white">Tin Zeljar - 2019 - tzeljar@tvz.hr</p>
</div>

</body>