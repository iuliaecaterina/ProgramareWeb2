<?php
include 'connection.php';

if(!isset($_POST["submit"])){
    $sql="SELECT * FROM bikes WHERE  ID='{$_GET['id']}'";
    $result=mysqli_query($con,$sql);
    $record=mysqli_fetch_array($result);
}else{
    $sql2="SELECT * FROM bikes WHERE id='{$_POST['id']}'";
    $result2=mysqli_query($con,$sql2);
    $rec=mysqli_fetch_array($result2);
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        $target="./images/".basename($_FILES['image']['name']);
    }else{
        $target=$rec['image'];
    }
    $sql1="UPDATE bikes SET brand='{$_POST['brand']}', model='{$_POST['model']}', type='{$_POST['type']}', size='{$_POST['size']}', color='{$_POST['color']}', pret='{$_POST['pret']}', description='{$_POST['description']}', image='{$target}' WHERE id='{$_POST['id']}'";
    mysqli_query($con, $sql1) or die(mysqli_error($con));
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    header('Location:admin.php');
}

?>

<h1>Editati inregistrarea</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    Brand:<br/><input type="text" name="brand" value="<?php echo isset($record['brand']) ? $record['brand'] : '' ?>"/><br/>
    Model:<br/><input type="text" name="model" value="<?php echo isset($record['model']) ? $record['model'] : '' ?>"/><br/>
    Tip:<br/><input type="text" name="type" value="<?php echo isset($record['type']) ? $record['type'] : '' ?>"/><br/>
    Culoare:<br/><input type="text" name="color" value="<?php echo isset($record['color']) ? $record['color'] : '' ?>"/><br/>
    Marime:<br/><input type="text" name="size" value="<?php echo isset($record['size']) ? $record['size'] : '' ?>"/><br/>
    Pret:<br/><input type="text" name="pret" value="<?php echo isset($record['pret']) ? $record['pret'] : '' ?>"/><br/>
    Descriere:<br/><input type="text" name="description" value="<?php echo isset($record['description']) ? $record['description'] : '' ?>"/><br/>
    Imagine curenta:<br/>
    <?php if(isset($record['image'])): ?>
        <?php echo "<img src='".$record["image"]."' alt='images' />"; ?>
    <?php endif; ?>
    Selectati o imagine noua:<br/><input type="file" name="image"/><br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" name="submit" value="Edit"/>
</form>
