<?php
 $connect=mysqli_connect( "localhost", "root");
 mysqli_select_db($connect, "team04");

$museumName = $_GET['MuseumName'];
$reviewtext= $_GET['message'];
$rating = $_GET['rating'];


if( $museumName != 'Choose...' && $reviewtext!= NULL ){

$success = true;

mysqli_query("start Transaction");
$query = "INSERT INTO Review (museum, score, comment) VALUES ('".$museumName."', $rating, '".$reviewtext."');";

$result = mysqli_query($connect, $query);
if(!$result || mysqli_affected_rows($connect) == 1) $success = false;

$query = "update myReservation set myreservation.reviewed = 1 where myreservation.museum = '".$museumName."' AND myreservation.date <'2019-12-4';";
$result = mysqli_query($connect, $query);
if(!$result) $success = false;

if ( $success == true ) {
    mysqli_query( $connect, "COMMIT" );
} else {
    mysqli_query( $connect, "ROLLBACK" );
    echo "<script>alert('Error happened during sending review.');window.location.replace(\"http://localhost:8080/review.html\");</script>";
}

  mysqli_free_result($result);
  mysqli_close($connect);

  header('Location: review.html');
  exit;

}

else {
  echo "<script>alert('Please choose Museum and write comment.');window.location.replace(\"http://localhost:8080/review.html\");</script>";

}

mysqli_free_result($result);
mysqli_close($connect); 
?>