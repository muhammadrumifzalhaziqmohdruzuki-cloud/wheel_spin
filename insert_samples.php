<?php
include "db.php";

$sql = "INSERT INTO wheels (title, theme, options) VALUES
    ('Lunch Picker', 'sunset', 'Nasi Lemak\nMee Goreng\nRoti Canai\nSatay\nLaksa'),
    ('Who Presents?', 'ocean', 'Aina\nHafiz\nSara\nDaniel'),
    ('Weekend Plan', 'candy', 'Futsal\nMovie\nStudy\nSleep\nRoad trip\nCafe')";

if (mysqli_query($conn, $sql)) {
    echo "3 wheels inserted";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
