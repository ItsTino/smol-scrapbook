<?php
require_once('../app/conf.php');
session_start();

//Check if $_SESSION['authState'] is not set or is not equal to 'logged_in'
if (!isset($_SESSION['authState']) || $_SESSION['authState'] !== 'logged_in') {
  //Redirect to login page
  header('Location: /index.php');
  exit;
}

//Get type variable from GET request
$type = $_GET['type'];
//Switch case to determine which type of file to display images, videos, or other, if it is not set redirect to home.php
switch ($type) {
  case 'images':
    //images
    //Search through media folder for image files and generate hyperlink for them and display them
    $dir = "media/";
    $files = scandir($dir);

    //Find all image files in $files
    $media = array();
    foreach ($files as $file) {
      if (preg_match('/\.(jpg|jpeg|png|gif)$/', $file)) {
        array_push($media, $file);
      }
    }
    //Reverse the order of the array so that the most recent images are displayed first
    $media = array_reverse($media);

    break;
  case 'videos':
    //videos
    //Search through media folder for video files and generate hyperlink for them and display them
    $dir = "media/";
    $files = scandir($dir);
    $media = array();
    foreach ($files as $file) {
      if (preg_match('/\.(mp4)$/', $file)) {
        array_push($media, $file);
      }
    }

    //Reverse the order of the array so that the most recent videos are displayed first
    $media = array_reverse($media);

    break;
  case 'other':
    $type = 'other';
    $dir = "media/";
    $files = scandir($dir);

    $media = array();
    foreach ($files as $file) {
      if (preg_match('/\.(jpg|jpeg|png|gif|mp4)$/', $file) == false) {
        //remove the . and .. files
        if ($file == '.' || $file == '..') {
          continue;
        } else {
          array_push($media, $file);
        }
      }
    }

    break;
  default:
    header('Location: /home.php');
    exit;
    break;
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$sitetitle ?></title>

  <link rel="apple-touch-icon" sizes="180x180" href="/rels/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/rels/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/rels/img/favicon-16x16.png">
  <link rel="manifest" href="/rels/img/site.webmanifest">

  <!--rels-->
  <link href="/rels/css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</head>

<body>
  <main class="flex-shrink-0">
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold"><?=$sitetitle ?></h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Files are listed in most recent upload order</p>
        <a href="upload.php" class="btn btn-primary">I want to upload something.</a>


        <div class="d-flex justify-content-center">

          <div>
            <h3>Media:</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php
              foreach ($media as $media) {
                echo '<div class="col">';
                echo '<div class="card h-100">';
                if ($type == 'images') {
                  echo '<img src="media/' . $media . '" class="card-img-top" alt="...">';
                } else if ($type == 'videos') {
                  echo '<video class="card-img-top" controls>';
                  echo '<source src="media/' . $media . '" type="video/mp4">';
                  echo '</video>';
                }
                echo '<div class="card-body">';
                echo '<h5 class="card-title"><a href="/media/' . $media . '">' . $media . '</a></h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <row>
            <p><a href="delete.php" class="btn btn-danger">I want to delete something.</a>
          </row>
          <br>
          <br>
          <row>
            <p><a href="home.php" class="btn btn-primary">Back to Home.</a></p>
          </row>
        </div>

      </div>

  </main>

  <footer class="footer mt-auto py-3 bg-light">
    <center>
      <span class="text-muted">Made with ♡ by <a href="https://valentino.cx"><u>Valentino Duval</u></a><span>
    </center>
  </footer>

</body>


</html>