<?php
  include 'libs/load.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!doctype html>
<html lang="en">

<?php
  load_template('_head');
?>
  <body>
  <?php
  load_template('_header');
?>

<main>

<? load_template('_signup');?>
</main>

<?
load_template('_footer');
?>


    <script src="/app/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
