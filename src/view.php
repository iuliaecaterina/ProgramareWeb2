<?php
     include 'connection.php';
     $sql="SELECT * FROM bikes WHERE id='{$_GET['id']}'";
     $query= mysqli_query($con, $sql) or die(mysqli_error($con));
     $row=mysqli_fetch_array($query);

        echo"Brand:".$row["brand"]."<br/>";
        echo"Model:".$row["model"]."<br/>";
        echo"Tip:".$row["type"]."<br/>";
        echo"Marime:".$row["size"]."<br/>";
        echo"Culoare:".$row["color"]."<br/>";
        echo"Pret:".$row["pret"]."<br/>"; 
        echo"Descriere:".$row["description"]."<br/>";
        echo "<img src='".$row["image"]."' alt='images' />"; 
?>

<a href="admin.php">Back</a>