<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents('components/head.html'); ?>

  <body style="background:#222; font-family:Arial, sans-serif; margin:0; padding:0;">

    <?php
      echo file_get_contents('components/nav.html');
      echo file_get_contents('components/basket.html');
    ?>

    <?php include "index_componets/small_carousel.php"; ?>

    <hr style="margin:40px 0; border:1px">

    <?php include_once "index_componets/card_template.php"; ?>
    <?php include "index_componets/cards.php"; ?>
    
    <?php include "index_componets/carousel.php"; ?>
    <?php include "index_componets/cards.php"; ?>

    <hr style="margin:10px 0; border:1px">
    <?php include "index_componets/cards.php"; ?>

    <hr style="margin:10px 0; border:1px">

    <?php echo file_get_contents('components/footer.html'); ?>

    <script src="assets/js/basket.js"></script>
    <script src="index_componets/random_card_gerater.js" defer></script>
  </body>
</html>
