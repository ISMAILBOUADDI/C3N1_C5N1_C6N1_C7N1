<?php  session_start() ; ?>
<?php
if (isset($_SESSION['db_nom'])) {
include "header.php" ?>
<?php echo " <a href='formation.php'>FORMATION </a> <a href='dev.php'>DEVELOPPEURS </a>
    <a href='list.php'>LISTS </a>";?>
    <a href="dev.php?hello=true" >LOGOUT</a>
   <?php
  if (isset($_GET['hello'])) {
    session_unset();
    header("location:login.php");};
echo  "</nav>"; 
?>
<form  action='list.php' method='POST'>
<div class="div"><select class="niveau" name="niveau" >
<option value='HTML'>HTML</option>
<option value="CGI">CGI</option>
<option value="JS">JS</option>
<option value="AJAX">AJAX</option>
<option value="PHP">PHP</option>
<input class="bouton btn" type="submit" name="submit" value="submit">
</select>
</div>
</form>

<?php
  
 echo "<h1>".$_SESSION['db_nom']." ".$_SESSION['db_prenom']."</h1>";
 $con = mysqli_connect('localhost','root','root','dev');
 if (!$con) {
     die("erreur") .mysqli_error($con);
 }
if (isset($_POST['submit'])) {
    $sub= $_POST['niveau'];
   $_SESSION['sub']=$sub;

   $qry="SELECT nom , prénom FROM developpeurs  ";
   $qry.="INNER JOIN technos ON developpeurs.id = technos.id where $sub = 5 ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);
if ($re) {
    echo "<h2>liste des experts on $sub :</h2>";
    
   while($row= mysqli_fetch_array($re))
   {
        echo "<ul class='li'>";
        echo "<li>- ".$row['nom']." ". $row['prénom']."</li>";
       echo "</ul>";
      
   }}
   $qry="SELECT nom , prénom  FROM developpeurs ";
   $qry.="INNER JOIN technos ON  developpeurs.id = technos.id where  $sub BETWEEN 3 AND 4 ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);
if ($re) {
    echo "<h2>liste des développeurs ayant un niveau moyenne on $sub :</h2>";
    
   while($row= mysqli_fetch_array($re))
   {
        echo "<ul class='li'>";
        echo "<li>- ".$row['nom']." ". $row['prénom']."</li>";
       echo "</ul>"; 
   }}
   $qry="SELECT * FROM developpeurs ";
   $qry.="INNER JOIN technos ON developpeurs.id = technos.id where $sub < 3 ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);

if ($re) {
    echo "<h2>liste des développeurs ayant un niveau moins ou inconnu on $sub :</h2>";
    ?>

    <form class="art" action='list.php' method='GET' >
    <input class='btn' type='submit' name='delete' value='Delete'>
    <input  class='btn' type="date" name="date" >
    <input class='btn' type='submit' name='save' value='Save'>
   
 </form>  
    <?php 
   while($row= mysqli_fetch_array($re))
   {
    $dev_id=$row['id'];
        echo "<ul>";
        echo "<li>- ".$row['nom']." ". $row['prénom'];
        // ?niveau=<?php echo $_GET['niveau'];?&submit=submit
        ?><form class="up" action="list.php" method='post' >
<select class="niv" name='niv'>
<option value='-1'>-1</option>
<option value='0'>0</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<input class='delete updete' type='submit' name='up' value='<?php echo $dev_id ;?>' >
</select>
     </form>
        </li>
       </ul>
       <?php
           }
}  
} 
//// update techno niveau
if (isset($_REQUEST["up"])) {
    $su= $_SESSION['sub'];
    $su=strtolower($su);
    $querry="UPDATE technos SET $su = ".$_POST['niv']." WHERE id = ".$_POST['up']." ";
     $up= mysqli_query($con , $querry);
    if (!$up) {
        die('erreur').mysqli_error($up);
    
      }
      echo "<Script>
alert('level has been updated '); 
</Script>"; 
    }



    /// set a date for a formation 
if (isset($_REQUEST["save"])) {
    $date =  strtotime($_GET['date']);
    $date= date("Y-m-d ", $date);

$qry="SELECT * FROM developpeurs ";
   $qry.="INNER JOIN technos ON developpeurs.id = technos.id where ".$_SESSION['sub']." < 2 ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);
while($row= mysqli_fetch_array($re))
   { 
   $query = "INSERT INTO formations (id , techno , date ) VALUES('". $row['id']."', '".$_SESSION['sub']."','$date')";
   $r= mysqli_query($con , $query);
    if (!$r) {
       die('erreur').mysqli_error($con);
    }
   
}
echo "<Script>
alert('formation has been added '); 
</Script>";
}


//delete a formation
if (isset($_REQUEST["delete"])) {
    $su= $_SESSION['sub'];
    $quer="DELETE FROM formations WHERE techno = '$su' ";
    $d= mysqli_query($con , $quer);
    if (!$d) {
        die('erreur').mysqli_error($d);
     }
     echo "<Script>
     alert('formation has been deleted '); 
     </Script>";

}



}
else {
  echo "<h1>CONNECTION FAILED PLEASE <a href='login.php' >LOGIN</a> </h1>";
}