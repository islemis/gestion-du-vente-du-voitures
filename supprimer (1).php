
<?php





$connection =mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'locationvoiture');



    $matricule=$_GET['matricule'];
    $query="DELETE FROM voiture where matricule='$matricule'";
    $query_run =mysqli_query($connection,$query);
    header('location:affichage.php');
  

?>




