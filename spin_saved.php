<?php
include "db.php";
include "wheel_lib.php";

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
$result = mysqli_query($conn, "SELECT * FROM wheels WHERE id = " . $id);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Wheel not found. <a href='saved.php'>Back</a>");
}

$items = cleanItems($row["options"]);
if (count($items) < 1) {
    die("This wheel has no options. <a href='saved.php'>Back</a>");
}
$winnerIndex = rand(0, count($items) - 1);
$winner = $items[$winnerIndex];

$w = mysqli_real_escape_string($conn, $winner);
mysqli_query($conn, "INSERT INTO spins (wheel_id, winner) VALUES ($id, '$w')");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Spin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1><?php echo htmlspecialchars($row["title"], ENT_QUOTES, "UTF-8"); ?></h1>

<?php drawWheel($items, $row["theme"], $winnerIndex, 5); ?>

<p class="winner" style="animation-delay: 5s">
    Winner: <?php echo htmlspecialchars($winner, ENT_QUOTES, "UTF-8"); ?>
</p>

<h3>Last 5 winners</h3>
<?php
$log = mysqli_query($conn,
    "SELECT winner, spun_at FROM spins WHERE wheel_id = $id ORDER BY id DESC LIMIT 5");

echo "<table><tr><th>Winner</th><th>When</th></tr>";
while ($r = mysqli_fetch_assoc($log)) {
    echo "<tr><td>" . htmlspecialchars($r["winner"], ENT_QUOTES, "UTF-8") . "</td>"
        . "<td>" . htmlspecialchars($r["spun_at"], ENT_QUOTES, "UTF-8") . "</td></tr>";
}
echo "</table>";
?>
<a href="saved.php">Back to saved wheels</a>
</body>
</html>
