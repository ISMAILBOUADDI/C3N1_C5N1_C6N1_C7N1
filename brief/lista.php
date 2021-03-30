<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>profile</title>
    <!-- <link rel="stylesheet" href="./src/main.css"> -->
    <style>
       table,tr,th{
           border : 1px solid black;
       }
    </style>
</head>

<body>

<?php
    include "config.php";
    $listdev="SELECT firstName , lastName FROM developers";
    $result = mysqli_query($con,$listdev);
    if(!$result ){
        echo"error:" .mysqli_error($con);
    }
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    ?>
    <h1>devloper list</h1> 
    <Table>
    <tr>
        <th>first name</th>
        <th>last name</th>
    </tr>
    <?php
    while( $row = mysqli_fetch_array( $result )):
    ?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
    </tr>
    <?php endwhile; ?>
    </Table>
    <a href="detl.php">details of skills</a>

   

   
</body>
