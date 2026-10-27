<?php
session_start();
session_unset();
session_destroy();
echo "History cleared. <a href='create.html'>Make a wheel</a>";
?>
