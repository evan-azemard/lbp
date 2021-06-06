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

<?php
/*Si tu est vendeur tu à accé*/
function remplaceV($nameA,$urlA){
      if (!empty($_SESSION['id'])) {
          if ($_SESSION['rank'] == 2) {
              echo "<a href='$urlA' class='colorlien'>";
              echo "$nameA";
              echo "</a>";
          } else {
              echo '';
          }
      }
}
/*Si tu n'est pa connecté tu à accé*/
function remplaceRIEN($nameA,$urlA){
    if (empty($_SESSION['id'])){
        echo "<a href='$urlA' class='colorlien'>";
        echo"$nameA";
        echo "</a>";
        }else{
        echo '';
    }

}
/*Si tu est admin tu à accé*/
function remplaceAd($nameA,$urlA){
    if (!empty($_SESSION['id']))
    {
    if ($_SESSION['rank'] == 3) {
        echo "<a href='$urlA' class='colorlien'>";
        echo "$nameA";
        echo "</a>";
    }else{
        echo '';
    }
    }
}
/*Si tu est connecté tu affiche*/
function remplaceID($nameA,$urlA){
    if (isset($_SESSION['id'])) {
        echo "<a href='$urlA' class='colorlien'>";
        echo "$nameA";
        echo "</a>";
    }else{
        echo '';
    }

}
?>
