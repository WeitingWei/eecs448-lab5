
<?php
  $nameId = $_POST['user'];
  $post = $_POST['post'];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "w802w369", "w456s786", "w802w369");
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  if(isset($nameId)){
    $userCheck = $mysqli->query("SELECT * FROM Users WHERE (user_id = '$nameId')");
    $addUser = "INSERT INTO Posts (content, author_id ) VALUES ('$post','$nameId');";
    if($nameId === ""){
      echo "Please enter a user name.";
    }
    else if(mysqli_num_rows($userCheck) == 0){
      echo "This user is not exist.";
      exit();
    }
    else if($post === ""){
      echo "Please enter in the post.";
    }
    else{
      if($mysqli->query($addUser) === TRUE){
        echo "You added post";
      }
    }
      $mysqli->close();
      exit();
  }
 ?>