<?php
require_once('../app/conf.php');
session_start();
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

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">



          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="passField" id="floatingPassword" placeholder="Password" style="background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" autocomplete="off">
            <label for="floatingPassword"></label>
          </div>
          <div>
            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-danger" onclick="authFunc()">Enter</button>
          </div>

        </div>
        <row>
          <span class="">smol-scrapbook v0.3.0 by <a href="https://valentino.cx/">valentino</a></span>
        </row>
      </div>
    </div>
  </main>



</body>

</html>