 <?php
if (isset($_GET['vkey'])){
  //Process Verification
  $vkey = $_GET['vkey'];


  //Connect to the database
  $mysqli=mysqli_connect('localhost','username','password');
        mysqli_select_db($mysqli,"dbname");
  //end

  $resultSet = $mysqli-> query("SELECT verified, vkey FROM accounts WHERE verified = 0 AND vkey='$vkey' LIMIT 1");

  if($resultSet->num_rows == 1){
    //Validate the email
    $update = $mysqli->query("UPDATE accounts SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

    if($update){
      echo("Your account has been verified. You may now login.");
    }else{
      echo $mysqli->error;
    }

  }
}else{
  die("Something went wrong");
}
?>
<html>
<head>
</head>
<body>
<center>
  <?php
  echo $mysqli->error;
   ?>
</center>
</body>
</html>
