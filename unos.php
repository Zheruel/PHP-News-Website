<?php
include "connect.php";
session_start();


if(isset($_POST['naslov']) && isset($_POST["kratki_sadrzaj"]) && isset($_POST["sadrzaj"]) && isset($_POST["kategorija"])){
    $naslov = $_POST['naslov'];
    $kratki_sadrzaj = $_POST['kratki_sadrzaj'];
    $sadrzaj = $_POST['sadrzaj'];
    $kategorija = $_POST["kategorija"];
    $datum = date("Y-m-d");
    if(isset($_POST['checkbox'])){
        $arhiva = 1;
    }
    else{
        $arhiva = 0;
    }
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["slika"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    //inserting data into DB
    $stmt = $dbc->prepare("INSERT INTO clanak(datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES(?, ?, ?, ?, ?, ?, ?)") or die("Prepare failed");
    $stmt->bind_param("ssssssi", $datum, $naslov, $kratki_sadrzaj, $sadrzaj, $target_file, $kategorija, $arhiva) or die("Failed");
    $stmt->execute() or die("Failed");

    $stmt = $dbc->prepare("SELECT * FROM clanak WHERE naslov = ?");
    $stmt->bind_param("s", $naslov);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    $id = $row["id"];
    header("Location: article.php?id=$id");
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
        <div class="row content">
          <div class="col-sm-2 sidenav"></div>
          <div class="col-sm-8 text-left">
            <?php
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
              echo("
              <form action='unos.php' method='POST' enctype='multipart/form-data'>
                <div class='form-group'>
                  <label for='naslov'>Naslov:</label>
                  <input type='text' class='form-control' id='naslov' name='naslov' minlength='5' maxlength='30' required>
                </div>
                <div class='form-group'>
                  <label for='kratki_sadrzaj'>Kratki sadrzaj vijesti (do 50 znakova):</label>
                  <textarea class='form-control' id='kratki_sadrzaj' name='kratki_sadrzaj' rows='5' minlength='10' maxlength='100' required></textarea>
                </div>
                <div class='form-group'>
                    <label for='sadrzaj'>Sadrzaj vijesti:</label>
                    <textarea class='form-control' id='sadrzaj' name='sadrzaj' rows='5' required></textarea>
                </div>
                <div class='form-group'>
                    <label for='slika'>Slika:</label>
                    <input type='file' class='form-control-file' id='slika' name='slika' required>
                </div>
                <div class='form-group'>
                    <label for='kategorija'>Kategorija</label>
                    <select class='form-control' id='kategorija' name='kategorija' required>
                      <option>Zabava</option>
                      <option>Ozbiljno</option>
                    </select>
                </div>
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' name='checkbox'>
                    <label class='form-check-label' for='defaultCheck1'>
                    Spremiti u arhivu:
                    </label>
                </div>
                <br>
                <button type='submit' class='btn btn-success'>Submit</button>
                <button type='reset' class='btn btn-danger'>Cancel</button>
              </form>
              ");
           }
           else{
            echo("
              <div class='container-fluid text-center text-danger'>
                <img src='images/danger.jpg' class='img-fluid' alt='Responsive image'>
              </div>
              <div class='container-fluid text-center text-danger'>
                Nemate pravo pristupiti ovoj stranici jer niste ulogirani, kliknite <a href='login.php'>OVDJE</a> da se ulogirate
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