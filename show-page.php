<?php

require_once './inc/db_connection.inc.php';

$id = 1;

if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];
}

$query = "SELECT id, contentPage FROM contents WHERE id = $id;";
$statement = $db->query($query);
$contentPage = $statement->fetch()['contentPage'];

if ($contentPage === NULL) {
  header("Location: ./demo");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://frissbee.de/images/logos/FrissBee-Logo_01.png" rel="icon" type="image/x-icon" />
    <title>page-O-builder: page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- the page-o-builder JavaScript file - !!! use "defer" !!! -->
    <script src="assets/js/page-o-builder.show-page_v.1.0.0.js" defer></script>

    <!-- optional: fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css"/>

    <!-- optional: FrissBee Audio Player -->
    <script src="./assets/js/frissbee-audio-player_v.1.0.4.js"></script>

    <!-- optional: FrissBee Accordion - !!! use "defer" !!! -->
    <script src="./assets/js/frissbee-accordion_v.1.0.0.js" defer></script>
    <link rel="stylesheet" href="assets/css/frissbee-accordion.css">

    <!-- optional: Little Image Viewer -->
    <script src="./assets/js/little-image-viewer_v.1.2.0.js"></script>
    <link rel="stylesheet" href="./assets/css/little-image-viewer.css" />

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

        // no autoplay by videos
        Carousel: {
          Video: {
            autoplay: false,
          },
        },
      });
  </script>

</html>
