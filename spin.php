<?php
session_start();
include "wheel_lib.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: create.html");
    exit;
}

$title = isset($_POST["title"]) ? trim($_POST["title"]) : "My Wheel";
$theme = isset($_POST["theme"]) ? $_POST["theme"] : "sunset";
$speed = isset($_POST["speed"]) ? $_POST["speed"] : "fast";
$items = cleanItems(isset($_POST["options"]) ? $_POST["options"] : "");
$count = count($items);

if ($count < 2) {
    echo "Please enter at least 2 options. <a href='create.html'>Back</a>";
    exit;
}

if ($speed == "fast") {
    $seconds = 3;
} else {
    $seconds = 6;
}

$winnerIndex = rand(0, $count - 1);
$winner = $items[$winnerIndex];

setcookie("lasttheme", $theme, time() + (86400 * 30), "/");

if (!isset($_SESSION["history"])) {
    $_SESSION["history"] = array();
}
$_SESSION["history"][] = $winner;

$saveMessage = "";
if (isset($_POST["save"])) {
    include "save_wheel.php";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Spin Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1><?php echo htmlspecialchars($title, ENT_QUOTES, "UTF-8"); ?></h1>

<p>Theme: <?php echo htmlspecialchars($theme, ENT_QUOTES, "UTF-8"); ?> |
Options: <?php echo $count; ?> |
Spin time: <?php echo $seconds; ?> seconds</p>

<?php drawWheel($items, $theme, $winnerIndex, $seconds); ?>

<ol>
<?php
for ($i = 0; $i < $count; $i++) {
    echo "<li>" . htmlspecialchars($items[$i], ENT_QUOTES, "UTF-8") . "</li>";
}
?>
</ol>

<p class="winner" style="animation-delay: <?php echo $seconds; ?>s">
    Winner: <?php echo htmlspecialchars($winner, ENT_QUOTES, "UTF-8"); ?>
</p>

<?php echo $saveMessage; ?>

<h3>Winners so far (this visit)</h3>
<ul>
<?php
$history = $_SESSION["history"];
$i = 0;
while ($i < count($history)) {
    echo "<li>" . htmlspecialchars($history[$i], ENT_QUOTES, "UTF-8") . "</li>";
    $i++;
}
?>
</ul>

<p>Last theme cookie:
<?php
if (isset($_COOKIE["lasttheme"])) {
    echo htmlspecialchars($_COOKIE["lasttheme"], ENT_QUOTES, "UTF-8");
} else {
    echo "(reload the page to see it)";
}
?></p>

<a href="reset.php">Clear history</a><br>
<a href="create.html">Make another wheel</a>
</body>
</html>
