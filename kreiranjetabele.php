<?php
  require "./konekcija.php";

  $sql="create table if not exists rezervacije(
    id int primary key auto_increment,
    ime varchar(10) not null,
    email varchar(30) not null,
    film varchar(30) not null,
    termin varchar(10) not null,
    broj_sedista int not null  
  )";

  if ($conn->query($sql) === TRUE) {
    echo "New table created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>