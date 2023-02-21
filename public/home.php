<?php
require_once('../app/conf.php');
session_start();

//Check if $_SESSION['authState'] is not set or is not equal to 'logged_in'
if (!isset($_SESSION['authState']) || $_SESSION['authState'] !== 'logged_in') {
    //Redirect to login page
    header('Location: /index.php');
    exit;
}


//Search through media folder for image files and generate hyperlink for them and display them
$dir = "media/";
$files = scandir($dir);

//Find all image files in $files
$images = array();
foreach ($files as $file) {
  if (preg_match('/\.(jpg|jpeg|png|gif)$/', $file)) {
    array_push($images, $file);
  }
}
//Reverse the order of the array so that the most recent images are displayed first
$images = array_reverse($images);

//Find first 11 images in $files
$images = array_slice($images, 0, 11);



//Find all mp4 files in $files
$videos = array();
foreach ($files as $file) {
  if (preg_match('/\.(mp4)$/', $file)) {
    array_push($videos, $file);
  }
}

//Reverse the order of the array so that the most recent videos are displayed first
$videos = array_reverse($videos);
//Find first 11 videos in $files
$videos = array_slice($videos, 0, 11);





//Find all other files in $files
$other = array();
foreach ($files as $file) {
  if (preg_match('/\.(jpg|jpeg|png|gif|mp4)$/', $file) == false) {
    //remove the . and .. files
    if ($file == '.' || $file == '..') {
      continue;
    } else {
      array_push($other, $file);
    }
    
  }
}


//Reverse the order of the array so that the most recent other files are displayed first
$other = array_reverse($other);






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
        <a href="delete.php" class="btn btn-danger">I want to delete something.</a>


        <div class="d-flex justify-content-center">

          <div>
            <h3>Photos: <a href="gallery.php?type=images">View all photos</a></h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php
              foreach ($images as $image) {
                echo '<div class="col">';
                echo '<div class="card h-100">';
                echo '<img src="media/' . $image . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title"><a href="/media/' . $image . '">' . $image . '</a></h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              ?>
            </div>
            


            <h3>Videos: <a href="gallery.php?type=videos">View all videos</a></h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php
              foreach ($videos as $videos) {
                echo '<div class="col">';
                echo '<div class="card h-100">';
                echo '<video src="media/' . $videos . '" class="card-img-top" alt="..." controls>';
                echo '</div>';
                echo '</div>';
              }
              ?>
            </div>

            <h3>Misc Files: <a href="gallery.php?type=other">View all misc</a></h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php
              foreach ($other as $other) {
                echo '<div class="col">';
                echo '<div class="card h-100">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title"><a href="/media/' . $other . '">' . $other . '</a></h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
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