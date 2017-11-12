<?php

include('../conf/dbconnect.php');
include('../conf/sescheck.php');

$email = $_SESSION['email'];

  // Get User's references by comparing BID.
  $qry1 = "SELECT * FROM bibliographies WHERE user = '$email'";
  $sql1 = mysqli_query($conn, $qry1);

  while ($row = mysqli_fetch_assoc($sql1)) {
    $bid = $row['bid'];
    $qry2 = "DELETE FROM reference WHERE bibliography = '$bid'";
    $sql2 = mysqli_query($conn, $qry2);
  };
  $qry3 = "DELETE FROM bibliographies WHERE user = '$email'";
  $sql3 = mysqli_query($conn, $qry3);

  $qry4 = "DELETE FROM users WHERE email = '$email'";
  $sql4 = mysqli_query($conn, $qry4);

  header("Refresh:0 url=../account/logout.php");


?>
