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
 ___________ _   _   _____        __                   _       
|_   _| ___ \ | | | /  __ \      / _|                 (_)      
  | | | |_/ / | | | | /  \/ __ _| |_ ___ _ __ ___ _ __ _  __ _ 
  | | |  __/| | | | | |    / _` |  _/ _ \ '__/ _ \ '__| |/ _` |
  | | | |   \ \_/ / | \__/\ (_| | ||  __/ | |  __/ |  | | (_| |
  \_/ \_|    \___/   \____/\__,_|_| \___|_|  \___|_|  |_|\__,_| v1.0
EOT;

echo "<pre>" . $texto . "</pre>";
echo "<br>";
echo "<p>Made with 🤍 by Isaac</p>";

?>


<?php StatusBarComponent(); ?>

</body>

</html>