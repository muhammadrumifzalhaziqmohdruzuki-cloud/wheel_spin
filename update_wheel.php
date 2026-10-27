<?php
include "db.php";

$sql = "UPDATE wheels
        SET title = 'Dinner Picker', theme = 'candy'
        WHERE id = 1";

if (mysqli_query($conn, $sql)) {
    echo "Wheel updated. <a href='saved.php'>See saved wheels</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
