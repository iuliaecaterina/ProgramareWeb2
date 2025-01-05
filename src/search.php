<?php
include "connection.php";

$sql = "SELECT * FROM bikes";

if(isset($_POST["search"])) {
    $search_term = mysqli_real_escape_string($con, $_POST["search_box"]);
    $sql .= " WHERE brand LIKE '%$search_term%' OR color LIKE '%$search_term%'";
}

$query = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<form name="search_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Search: <input type="text" name="search_box" value=""/>
    <input type="submit" name="search" value="Search the table">
</form>

<table width="70" cellpadding="4" cellspace="4">
    <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Tip</th>
        <th>Marime</th>
        <th>Culoare</th>
        <th>Pret</th>
        <th>Descriere</th>
    </tr>
    <?php while($row = mysqli_fetch_array($query)) { ?>
        <tr>
            <td><?php echo $row["brand"];?></td>
            <td><?php echo $row["model"];?></td>
            <td><?php echo $row["type"];?></td>
            <td><?php echo $row["color"];?></td>
            <td><?php echo $row["size"];?></td>
            <td><?php echo $row["pret"];?></td>
            <td><?php echo $row["description"];?></td>
            <td><img src="images/<?php echo $row['image']; ?>" width="100" height="100"/></td>
        </tr>
    <?php } ?>
</table>
