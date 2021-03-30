<?php  session_start() ; ?>

<?php 
if (isset( $_SESSION['db_email'])) { 

$firstName=$_SESSION['db_firstName']  ;
 $lastName=$_SESSION['db_lastName'] ;
 $db_role =$_SESSION['db_role'];

  if( $db_role =='admin') { 
    header("location:lista.php");
    
    echo "<h2>".$_SESSION['db_firstName']." ".$_SESSION['db_lastName']."</h2>";
  }
  else {
      
    include "config.php";
   $qry="SELECT * FROM technos INNER JOIN developers ON  technos.dev_id = developers.id ";
   $qry.="where firstName = '$firstName' and lastName= '$lastName' ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);
    if (!$re) {
       die('erreur'. mysqli_error($con));
    }

    if ($re) {
     
while($row= mysqli_fetch_array($re))
{
    echo "<h2>".$_SESSION['db_firstName']." ".$_SESSION['db_lastName']."</h2>";

   echo "
    <article class='art'>
    <div> 
    <label >HTML</label>
    <label >level : <strong> ".$row['html']."</strong>  </label>
    </div>
    <div> 
    <label>CGI</label>
    <label >level :<strong> ".$row['cgi']."</strong></label>
    </div>
    <div> 
    <label >JavaScript</label>
    <label >level  :<strong> ".$row['js']."</strong></label>
    </div>
    <div> 
    <label >AJAX</label>
    <label >level  :<strong>".$row['ajax']."</strong></label>
    </div>
    <div> 
    <label >PHP</label>
    <label >level  :<strong>".$row['php']."</strong></label>
    </div>
    </article>";
}}}}
    
    else {
      echo "<h1>CONNECTION FAILED PLEASE <a href='login.php' >LOGIN</a> </h1>";
    }

    
    ?>