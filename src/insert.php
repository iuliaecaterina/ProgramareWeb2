<?php
include "connection.php";

if(isset($_POST["submit"])){
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $type = $_POST["type"];
    $size = $_POST["size"];
    $color = $_POST["color"];
    $pret = $_POST["pret"];
    $description = $_POST["description"];

    // Verifică dacă există o imagine încărcată
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $image = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
    } else {
        $image = ""; // Dacă nu există o imagine încărcată, setează $image ca fiind un șir gol
    }

    $sql="INSERT INTO bikes (brand, model, type, size, color, pret, description, image) VALUES('$brand', '$model', '$type', '$size','$color','$pret','$description', '$image')"; 
    $query= mysqli_query($con,$sql) or die(mysqli_error($con));
    echo "Inregistrarea a fost adaugata cu succes!";
} 
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    Brand:<br/><input type="text" name="brand"/><br/>
    Model:<br/><input type="text" name="model"/><br/>
    Tip:<br/><input type="text" name="type"/><br/>
    Marime:<br/><input type="text" name="size"/><br/>
    Culoare:<br/><input type="text" name="color"/><br/>
    Pret:<br/><input type="text" name="pret"/><br/>
    Descriere:<br/><input type="text" name="description"/><br/>
    Imagine:<br/><input type="file" name="image"/><br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
<br/><br/>
<a href="admin.php">admin</a>
<br/><br/>
