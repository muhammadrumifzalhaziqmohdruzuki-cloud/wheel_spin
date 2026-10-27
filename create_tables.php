<?php
include "db.php";

$sql1 = "CREATE TABLE wheels (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(60) NOT NULL,
    theme VARCHAR(20),
    options TEXT
)";

$sql2 = "CREATE TABLE spins (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    wheel_id INT(5),
    winner VARCHAR(60),
    spun_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql1)) {
    echo "Table wheels created<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

if (mysqli_query($conn, $sql2)) {
    echo "Table spins created<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}
?>
