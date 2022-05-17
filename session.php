<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
$_SESSION["emailSession"] = "";
echo "Session variables are set";
echo "<br/>";
print_r($_SESSION);
?>

</body>
</html>