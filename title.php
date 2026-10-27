<?php
$title = "Lunch Picker";
$items = 5;
$slice = 360 / $items;

echo "Wheel title: " . $title . "<br>";
echo "Characters in the title: " . strlen($title) . "<br>";
echo "The word Picker starts at position: " . strpos($title, "Picker") . "<br>";
echo "Items on the wheel: " . $items . "<br>";
echo "Each slice is " . $slice . " degrees wide.";
?>
