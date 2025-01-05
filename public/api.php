<?php
require_once('../app/globalFuncs.php');
session_start();

//Check if $_SESSION['authState'] is not set or is not equal to 'logged_in'
if (!isset($_SESSION['authState']) || $_SESSION['authState'] !== 'logged_in') {
echo 'badlogin';
exit;
}


//upload.php

if(isset($_FILES['images'])) {
    for($count = 0; $count < count($_FILES['images']['name']); $count++) {
        // Get file extension
        $extension = pathinfo($_FILES['images']['name'][$count], PATHINFO_EXTENSION);
        
        // Generate new filename
        $new_name = uuidv4() . '.' . $extension;
        $file_path = 'media/' . $new_name;
        $thumb_path = 'thumbs/' . $new_name;
        
        // Move uploaded file
        if(move_uploaded_file($_FILES['images']['tmp_name'][$count], $file_path)) {
            // Create thumbnail
            $source_image = null;
            
            // Create image resource based on file type
            switch(strtolower($extension)) {
                case 'jpeg':
                case 'jpg':
                    $source_image = imagecreatefromjpeg($file_path);
                    break;
                case 'png':
                    $source_image = imagecreatefrompng($file_path);
                    break;
                case 'gif':
                    $source_image = imagecreatefromgif($file_path);
                    break;
                case 'webp':
                    $source_image = imagecreatefromwebp($file_path);
                    break;
            }
            
            if($source_image) {
                // Get original image dimensions
                $width = imagesx($source_image);
                $height = imagesy($source_image);
                
                // Set thumbnail dimensions (max 150px width/height while maintaining aspect ratio)
                $max_size = 150;
                if($width > $height) {
                    $new_width = $max_size;
                    $new_height = floor($height * ($max_size / $width));
                } else {
                    $new_height = $max_size;
                    $new_width = floor($width * ($max_size / $height));
                }
                
                // Create thumbnail image
                $thumbnail = imagecreatetruecolor($new_width, $new_height);
                
                // Preserve transparency for PNG
                imagealphablending($thumbnail, false);
                imagesavealpha($thumbnail, true);
                
                // Resize image to thumbnail size
                imagecopyresampled($thumbnail, $source_image, 
                    0, 0, 0, 0, 
                    $new_width, $new_height, $width, $height);
                
                // Save thumbnail
                imagepng($thumbnail, $thumb_path);
                
                // Free up memory
                imagedestroy($thumbnail);
                imagedestroy($source_image);
            }
        }
    }
    echo 'success';
}

?>