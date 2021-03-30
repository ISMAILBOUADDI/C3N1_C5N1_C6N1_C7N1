

<?php  session_start() ; ?>
<?php
 

 if(isset($_POST['submit'])) {
    $html = $_POST['html'];
 $cgi = $_POST['cgi'];
 $js = $_POST['js'];
 $ajax = $_POST['ajax'];
 $php = $_POST['php'];

    include "config.php";

 $qry="SELECT * FROM developers  ";
 if(!$qry)
 {
 die("Query Failed: ");
 }
 $re= mysqli_query($con , $qry);
 if ($re) {
    while($row= mysqli_fetch_array($re))
    {
        $db_id = $row['id'];
        $db_firstName = $row['firstName'];
        $db_lastName = $row['lastName'];
    }
   
    $query = "INSERT INTO technos (dev_id,html,cgi,js,ajax,php) VALUES('$db_id','$html', '$cgi','$js','$ajax','$php')";
    $r= mysqli_query($con , $query);
     if (!$r) {
        die('erreur !!!!!').mysqli_error($con);
     }
     if ($r) {
     header("location: index.php");
   }   }}
