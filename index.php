<?php

// For the URL after saving
// see button "show page" below
$id = false;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://frissbee.de/images/logos/FrissBee-Logo_01.png" rel="icon" type="image/x-icon" />
    <title>page-O-builder: editor</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <!-- optional: fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

    <!-- otional: FrissBee Audio Player -->
    <script src="./assets/js/frissbee-audio-player_1.0.3.js"></script>

    <!-- CSS  -->
    <link rel="stylesheet" href="assets/css/page-o-builder.editor.v0.1.0.min.css" />
  </head>
  <body>
    <main>
      <div class="pb-5">
        <div style="background-color: #4696c8;">
          <div class="container pt-2 pb-1 d-flex justify-content-between">
            <h4><i style="color: #fff">page</i><span style="color: #000">-O-</span><i style="color: #fff">builder</i></h4>
            <h4 style="color: #1e1e1e"><i>editor</i></h4>
          </div>
        </div>

        <!-- here your HTML -->
        <div class="d-flex justify-content-between py-3 mb-4 border-bottom" style="background-color: #e0e0e0;">
          <div>
            <!-- your button for saving the data -->
            <button class="btn btn-danger ms-2 btn-save-data">save</button>
          </div>
          <div>
            <?php if($id !== false) : ?>
              <!-- your button for show page -->
              <a href="./show-page.php?id=<?= $id ?>" target="_blank" rel="noopener noreferrer">
                <button class="btn btn-primary me-2">show page</button>
              </a>
            <?php endif ?>
          </div>
        </div>

        <!-- the HTML for the page builder -->
        <!-- The attributes -->
        <!-- container:           for YOUR container CSS class (here an example with bootstrap) -->
        <!-- output:              class name or id of the output / preview HTML element  -->
        <!-- is-frissbee-player:  If the FrissBee Player is implemented, the attribute "is-frissbee-player" must be specified -->
        <!-- no-data:             When a new page is created (meaning no data is loaded) the attribute "no-data" must be set -->
        <div class="px-2">
          <page-o-builder container="container" output=".preview-output" is-frissbee-player <?= $id === false ? 'no-data' : '' ?>></page-o-builder>
        </div>
        <!-- the output / preview HTML element -->
        <!-- Note: "display: none" must be set. The other CSS style is optional. -->
        <div class="preview-output" style="display: none; border-top: 1px solid #000; border-bottom: 1px solid #000"></div>
        <!-- ================================================ -->
      </div>
    </main>
  </body>

  <!-- All files that need to be implemented. -->
  <!-- The order is important! -->

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://rawcdn.githack.com/RickStrahl/jquery-resizable/0.35/dist/jquery-resizable.min.js"></script>

  <!-- prismjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/plugins/line-highlight/prism-line-highlight.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-php.min.js"
    integrity="sha512-6UGCfZS8v5U+CkSBhDy+0cA3hHrcEIlIy2++BAjetYt+pnKGWGzcn+Pynk41SIiyV2Oj0IBOLqWCKS3Oa+v/Aw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"
    integrity="sha512-QXFMVAusM85vUYDaNgcYeU3rzSlc+bTV4JvkfJhjxSHlQEo+ig53BtnGkvFTiNJh8D+wv6uWAQ2vJaVmxe8d3w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-sql.min.js"
    integrity="sha512-sijCOJblSCXYYmXdwvqV0tak8QJW5iy2yLB1wAbbLc3OOIueqymizRFWUS/mwKctnzPKpNdPJV3aK1zlDMJmXQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>

  <!-- trumbowyg text editor -->
  <script src="assets/js/trumbowyg.v2.28.0.min.js"></script>
  <script src="assets/js/trumbowyg.plugins.min.js"></script>
  <script>
    $.trumbowyg.svgPath = './_media/svg/icons.svg';
  </script>

  <!-- page builder & own JS -->
  <script src="./assets/js/page-o-builder.editor.v0.1.0.min.js"></script>
  <script src="./assets/js/my-script.js"></script>

  <script>
    // optional: fancybox
    Fancybox.bind('[data-fancybox]', {
        // Your custom options
        // see: https://fancyapps.com/fancybox/api/options/
      });
  </script>


</html>
