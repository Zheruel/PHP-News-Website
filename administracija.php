<?php
include "connect.php";
session_start();
$query = "SELECT * FROM clanak";
$result = mysqli_query($dbc, $query);
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
        <div class="row content">
          <div class="col-sm-2 sidenav"></div>
          <div class="col-sm-8 text-left">
            <?php
            if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['razina_prava'] == 1) {
                echo("
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Naslov clanka</th>
                            <th scope='col'>Datum</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                <tbody>
                ");
                while($row = mysqli_fetch_array($result)){
                    $naslov = $row["naslov"];
                    $datum = $row["datum"];
                    $id = $row["id"];
                    echo("
                    <tr>
                        <td>$id</td>
                        <td><a href='article.php?id=$id'>$naslov</a></td>
                        <td>$datum</td>
                        <td><a class='btn btn-danger' href='delete.php?id=$id' role='button'>Obrisi</a></td>
                    </tr>
                    ");
                }
                echo("
                </tbody>
                </table>
                ");
           }
           else{
            echo("
              <div class='container-fluid text-center text-danger'>
                <img src='images/danger.jpg' class='img-fluid' alt='Responsive image'>
              </div>
              <div class='container-fluid text-center text-danger'>
                Nemate pravo pristupiti ovoj stranici jer administrator
              </div>
            ");
          }
            ?>
          </div>
          <div class="col-sm-2 sidenav"></div>
        </div>
</div>

</div>

<div class="jumbotron text-center bg-primary" style="margin-bottom:0">
  <p class="text-white">Tin Zeljar - 2019 - tzeljar@tvz.hr</p>
</div>

</body>