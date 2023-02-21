<?php
require_once('../app/conf.php');
session_start();

//Check if $_SESSION['authState'] is not set or is not equal to 'logged_in'
if (!isset($_SESSION['authState']) || $_SESSION['authState'] !== 'logged_in') {
  //Redirect to login page
  header('Location: /index.php');
  exit;
}

//Check if request is POST and if it is, check if the request is from the delete button
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
  //Delete the file
  unlink('media/' . $_POST['delete']);
  //Redirect to home page
  header('Location: /home.php');
  exit;
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
  <script src="/rels/js/mAuth.js"></script>

</head>

<body>
  <main class="flex-shrink-0">
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold"><?=$sitetitle ?></h1>
      <div class="col-lg-6 mx-auto">
      <p class="mb-4">To delete a file. Enter the name of the file. For example:</p>
      <p class="mb-4"><code>c75fee46-0b3f-4d01-8fec-4bfa9656e6c8.mp4</code></p>
      <p class="mb-4"><code>887fcb28-8fe4-408b-9a33-10adfa6aa050.jpg</code></p>
      <p class="mb-4">If the file exists it will be deleted. If it doesn't work pls lmk. You can find the name of the file in the gallery if you click on view all images/videos/misc.</p>

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">



          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" name="floatingMediaName" id="floatingMediaName" placeholder="Name" style="background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" autocomplete="off">
          </div>
          <div>
            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-danger" onclick="deleteFunc()">Delete</button>
          </div>

        </div>
        <row>
            <p><a href="home.php" class="btn btn-primary">Back to Home.</a></p>
          </row>
      </div>
    </div>
  </main>



</body>

<script>
    function deleteFunc() {
      //Send POST request to delete.php with the name of the file to delete as the delete parameter
      fetch('delete.php', {
        method: 'POST',
        body: new URLSearchParams({
          delete: document.getElementById('floatingMediaName').value
        })
      }).then(response => {
        //Redirect to home page
        window.location.href = 'home.php';
      });
    }

</script>
</html>