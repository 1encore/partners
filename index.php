<?php

  if(isset($_SESSION['id'])){
    $page = 'profile';
  }else{
    $page = 'registration';
  }

  include 'db/db.php';

  #session for login
  session_start();

  #for correct appearance of cirilic fonts
  if($connection->query("SET NAMES utf8")){

  include 'templates/engine.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>

      <!-- Start References -->
      <?php include 'templates/references.php'; ?>
      <!-- Stop References -->

    </head>
    <body>

        <!-- Start Header -->
        <?php if($page!='404') include 'templates/header.php'; ?>
        <!-- End Header -->

        <?php include 'pages/'.$page.'.php'; ?>

        <!-- Footer One -->
        <?php include 'templates/footer.php'; ?>
        <!-- End Footer One -->

    </body>
</html>

<?php } ?>
