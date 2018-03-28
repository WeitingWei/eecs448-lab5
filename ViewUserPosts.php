<?php
  $selected = $_POST["users"];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "w802w369", "w456s786", "w802w369");
  if ($mysqli->connect_errno) {
    printf("Failed to connect to database: %s\n", $mysqli->connect_error);
    exit();
  }
  $posts = "SELECT post_id, content FROM Posts WHERE author_id='$selected';";
  echo("<table>");
  echo("<tr><th><b>Posts by: " . $selected . "</b></th></tr>");
  if($posts = $mysqli->query($posts)) {
    if(mysqli_num_rows($posts) == 0) {
      echo("<td>There are no posts for the user " . $selected . "<br></td>");
    }
    while($rows = $posts->fetch_assoc()) {
      $current = $rows['content'];
      echo("<tr><td>" . $current . "</td></tr>");
    }
  }
  echo("</table>");
  $mysqli->close();
?>