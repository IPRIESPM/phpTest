<?php

namespace src\View;

// Components
include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');


HeaderComponent("home");
ScreenComponent("home");
?>

<?php
$texto = <<<EOT

 _____ _____   __   ___       __     _           __     
|_   _| _ \ \ / /  / __|__ _ / _|___| |_ ___ _ _/_/__ _ 
  | | |  _/\ V /  | (__/ _` |  _/ -_)  _/ -_) '_| / _` |
  |_| |_|   \_/    \___\__,_|_| \___|\__\___|_| |_\__,_|  v1.0

EOT;

echo "<pre>" . $texto . "</pre>";
echo "<br>";
echo "<p>Made with 🤍 by Isaac</p>";

?>


<?php StatusBarComponent(); ?>

</body>

</html>