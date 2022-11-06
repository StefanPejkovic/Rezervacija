<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require "./kreiranjetabele.php";

$email = $film = $ime = $termin = "";
$emailErr = $filmErr = $imeErr = $terminErr = "";
$sedistaErr = "";
$sedista = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = test_input($_POST["ime"]);
    $email = test_input($_POST["email"]);
    $film = test_input($_POST["film"]);
    $termin = test_input($_POST["termin"]);
    $sedista = test_input($_POST["sedista"]);
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["ime"])) {
        $imeErr = "Ime je obavezno";
    } else {
        $ime = test_input($_POST["ime"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email je obavezan";
    } else {
        $email = test_input($_POST["email"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["film"])) {
        $filmErr = "Film je obavezan";
    } else {
        $film = test_input($_POST["film"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["termin"])) {
        $terminErr = "Termin je obavezan";
    } else {
        $termin = test_input($_POST["termin"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["termin"])) {
        $terminErr = "Termin je obavezan";
    } else {
        $termin = test_input($_POST["termin"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["sedista"])) {
        $sedistaErr = "Broj sedista je obavezan";
    } else {
        $sedista = test_input($_POST["sedista"]);
    }
    
}
    require "./konekcija.php";

    $sql="insert into rezervacije(ime, email, film, termin, broj_sedista) 
    values ('$ime', '$email', '$film', '$termin', '$sedista')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }


?>

<h1>Naslov</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Ime <input type="text" name="ime">
<span class="error">*<?php echo $imeErr;?></span><br>
Email <input type="email" name="email">
<span class="error">*<?php echo "".$emailErr;?></span><br>
<label for="film">Film:</label>

<select id="film" type="text" name="film">
<option value=" ">-----</option>
  <option value="film1">film1</option>
  <option value="film2">film2</option>
  <option value="film3">film3</option>
</select>
<span class="error">*<?php echo "".$filmErr;?></span><br>

<label for="termin">Termin:</label>
<select id="termin" type="text" name="termin">
  <option value="16">16h</option>
  <option value="18">18h</option>
  <option value="20">20h</option>
</select>
<span class="error">*<?php echo "".$terminErr;?></span><br>
Broj sedista <input type="number" name="sedista">
<span class="error">*<?php echo "".$sedistaErr;?></span><br>
<input type="submit" value="Rezervisi">
</form>


</body>
</html>
