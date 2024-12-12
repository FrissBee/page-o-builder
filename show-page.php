<?php

require_once './inc/db_connection.inc.php';

$id = 4;

if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];
}

$query = "SELECT id, contentPage FROM contents WHERE id = $id;";
$statement = $db->query($query);
$contentPage = $statement->fetch()['contentPage'];

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>page-O-builder: page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- optional: fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

    <!-- otional: FrissBee Audio Player -->
    <script src="./assets/js/frissbee-audio-player_1.0.3.js"></script>
    <script src="./assets/js/show-page.js" defer></script>

    <!-- the page-o-builder JS file -->
    <script src="assets/js/page-o-builder.show-page.v0.1.0.js" defer></script>
  </head>
  <body>
    <main>
    <div style="background-color: #4696c8;">
          <div class="container pt-2 pb-1 d-flex justify-content-between">
            <h4><i style="color: #fff">page</i><span style="color: #000">-O-</span><i style="color: #fff">builder</i></h4>
            <h4 style="color: #1e1e1e"><i>page</i></h4>
          </div>
        </div>

        <?= $contentPage ?>

    </main>
  </body>
  <script>
    // optional: fancybox
    Fancybox.bind('[data-fancybox]', {
        // Your custom options
        // see: https://fancyapps.com/fancybox/api/options/
      });
  </script>




</html>
