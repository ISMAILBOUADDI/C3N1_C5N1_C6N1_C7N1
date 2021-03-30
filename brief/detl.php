<?php  session_start() ; ?>
<?php
if (isset($_SESSION['db_email'])) {
include "str.php" ?>
<center>
<form  action='detl.php' method='POST'>
<div class="div"><input type="text" name="level_lang" >
<input class="bouton btn" type="submit" name="submit" value="search">
</div>
</form>
</center>

<?php 
  
  include "config.php";
if (isset($_POST['submit'])) {
    $sub= $_POST['level_lang'];
       $_SESSION['level_lang']=$sub;
   $qry="SELECT firstName , lastName FROM developers";
   $qry.="INNER JOIN technos ON developers.id = technos.dev_id where $sub = 5 ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);
if ($re) {
    echo "<h2>liste des experts on $sub :</h2>";
    
   while($data= mysqli_fetch_array($re))
   {
        echo "<ul class='li'>";
        echo "<li>- ".$data['firstName']." ". $data['lastName']."</li>";
       echo "</ul>";
      
   }}
   $qry="SELECT firstName , lastName  FROM developers ";
   $qry.="INNER JOIN technos ON  developers.id = technos.dev_id where  $sub BETWEEN 3 AND 4 ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);
if ($re) {
    echo "<h2>list of developers with an average level on $sub :</h2>";
    
   while($data= mysqli_fetch_array($re))
   {
        echo "<ul class='li'>";
        echo "<li>- ".$data['firstName']." ". $data['lastName']."</li>";
       echo "</ul>"; 
   }}
   $qry="SELECT * FROM developers ";
   $qry.="INNER JOIN technos ON developers.id = technos.dev_id  WHERE $sub < 3 ";
if(!$qry)
{
die("Query Failed: ");
}
$re= mysqli_query($con , $qry);

if ($re) {
    echo "<h2>list of developers with an bad level on $sub :</h2>";
    while($data= mysqli_fetch_array($re))
    {
         echo "<ul class='li'>";
         echo "<li>- ".$data['firstName']." ". $data['lastName']."</li>";
        echo "</ul>"; 
    }}
    $qry="SELECT * FROM developers ";
    $qry.="INNER JOIN technos ON developers.id = technos.dev_id  WHERE $sub ='-1' ";
 if(!$qry)
 {
 die("Query Failed: ");
 }
 $re= mysqli_query($con , $qry);
 
 if ($re) {
     echo "<h2>ist of developers with unknown level  on $sub :</h2>";
     ?>
     
    <?php 
   while($data= mysqli_fetch_array($re))
   {
        echo "<ul>";
        echo "<li>- ".$data['firstName']." ". $data['lastName'];
        ?>
        <center>
      <label for="show" class="show-btn">Update</label>
      <div class="container">
        <label for="show" class="close-btn fas fa-times" title="close"></label>
        
        <form class="up" action="detl.php" method='POST'>
        <input class="up" type ="text" class="niv" name='niv'>

<input type='submit' name='update' value='<?php echo"update";?>' >
            
        </form>
      </div>
        </center>
        </li>
       </ul>
       <?php
           }
          } 
} 
// update techno niveau
  $su=$_SESSION['level_lang'];
    $querry="UPDATE technos SET $su = ".$_POST['niv']."";
    $querry.="WHERE ";
     $up= mysqli_query($con ,$querry);
    if (!$up) {
        die('erreur').mysqli_error($up);
      }
      else{
        echo "succssed"; 
        exit;

      }
  }
