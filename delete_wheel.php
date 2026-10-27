<?php
include "db.php";

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

// Delete the spin history first, then the wheel itself
mysqli_query($conn, "DELETE FROM spins WHERE wheel_id = $id");

$sql = "DELETE FROM wheels WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    echo "Wheel deleted. <a href='saved.php'>Back to the list</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
