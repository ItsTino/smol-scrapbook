# smol-scrapbook
 
This is a tiny gallery for videos and images.
It is easily modifiable and extensible.

Lacks many comforts and features of more complex projects but this may fit your needs if you need a disposable and quick to deploy gallery.

Best used for small groups or communities where content can be assumed acceptable and self moderated.

## Features
* Single password protected site
* No user profiles required
* Easily extensible file conversion script
* Easily modifiable accepted file list
* Unlimited upload size
* Simple delete functionality (To address accidental uploads)

## Quick Start
* Modify app/conf.php
```php
<?php
$sitetitle = "smol-scrapbook";
$sitename = "smol-scrapbook";
$loginpassword = "change_me_please"
?>
```

* Place app and public on webserver
* Set vhost document root to public/
* Set permissions for /media

## Technicals
* Pure site requires only PHP
* FFMPEG + ImageMagick required for media conversion script

