<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<a id="floater" href="CreateUser.html"><button>Back to User Create</button></a>
		<?php
            $nameId = $_POST['user'];
            $mysqli = new mysqli("mysql.eecs.ku.edu", "w802w369", "w456s786", "w802w369");
        if ($mysqli->connect_errno) {
              printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
        }
        if(isset($userId)){
    $userCheck = $mysqli->query("SELECT * FROM Users WHERE (user_id = '$userId')");
    $addUser = "INSERT INTO Users (user_id) VALUES ('$userId');";
    if(mysqli_num_rows($userCheck) > 0){
      echo "This user name has been taken before.";
      exit();
    }
        else if($mysqli->query($addUser)=== TRUE){
          echo "Now we are adding user!";
       }
    else{
      echo "You added wrong user<br>";
    }
      $mysqli->close();
  }
  else{
    echo "No input <br>";
    exit();
  }
 ?>
	</body>
</html>

