<?php
echo 'send receive';

 $connect=mysqli_connect( "localhost",  "root");
 mysqli_select_db($connect, "team04");


if(isset($_GET['submit'])){//to run PHP script on submit
if(!empty($_GET['image'])){
// Loop to store and display values of individual checked checkbox.
foreach($_GET['image'] as $selected){
  $query3 = "INSERT INTO MyList (user, museum, reserved) VALUES ('vivi', '".$selected."', 0);";
  $result3 = mysqli_query($connect, $query3);
  if($result3){
  }
  else{
      printf("Could not retrieve records: %s\n", mysqli_error($connect));
  }
}
}
}


mysqli_free_result($result3);
mysqli_close($connect); 


header('Location: artist.html');
exit;

?>