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
  require "./konekcija.php";
  $sql="select * from rezervacije";
  $rezultat=$conn->query($sql);
  if ($rezultat->num_rows > 0) {
    // output data of each row
    while($red = $rezultat->fetch_assoc()) {
      echo "id: " . $red["id"]. " -Ime: " . $red["ime"]. "-email " . $red["email"]. "-film " . $red["film"]."-termin " . $red["termin"]."-Broj sedista " . $red["broj_sedista"]."<br>";
    }
  } else {
    echo "0 results";
  }
  ?>  
</body>
</html>