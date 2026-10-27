<?php
include "db.php";

$t = mysqli_real_escape_string($conn, $title);
$o = mysqli_real_escape_string($conn, isset($_POST["options"]) ? $_POST["options"] : "");
$themeSafe = mysqli_real_escape_string($conn, $theme);

$sql = "INSERT INTO wheels (title, theme, options)
        VALUES ('$t', '$themeSafe', '$o')";

if (mysqli_query($conn, $sql)) {
    $saveMessage = "Wheel saved. <a href='saved.php'>See saved wheels</a>";
} else {
    $saveMessage = "Could not save: " . htmlspecialchars(mysqli_error($conn), ENT_QUOTES, "UTF-8");
}
?>
