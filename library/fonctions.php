<?php
//Pour le débug
function debug($variable,$color = null){
    if (!isset($color)){
        $color = "gray";
    }
    echo "<span style='color: $color; font-weight: bold; font-size: 1.2vh; '>";
    echo '<pre>';
    print_r($variable);
    echo '</pre> <hr>';
    echo '<span>';
}
?>