<?php
/*    header("Location: login");*/


/*Page error*/
if (isset($errors)) {
    foreach ($errors as $error) {
        echo "<div class='error_ins2'>";
        echo "• " . $error . "<br>";
        echo "</div>";
    }
}
