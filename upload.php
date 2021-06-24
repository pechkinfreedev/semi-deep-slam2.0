<?php
  if( isset($_POST['file'])) {

     $target_dir = "/var/www/a/data/";
     $target_file = $target_dir . "aaa";
     $somepath =  $target_dir;
     $datafile = $target_dir . "datafile";

     if( is_dir($datafile)) {
         rrmdir($datafile);
     } 

     if (move_uploaded_file( $_FILES['folderzip']['tmp_name'], $target_file)) 
     {
       echo "The file  has been uploaded.";
       $zip = new ZipArchive();
       if($zip->open($target_file)){
         $zip->extractTo($somepath);
         $zip->close();
         
         unlink($target_file);
       }
     } else {
       echo "Sorry, there was an error uploading your file.";
     }

   }


   function rrmdir($dir) { 
    if (is_dir($dir)) { 
      $objects = scandir($dir);
      foreach ($objects as $object) { 
        if ($object != "." && $object != "..") { 
          if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
            rrmdir($dir. DIRECTORY_SEPARATOR .$object);
          else
            unlink($dir. DIRECTORY_SEPARATOR .$object); 
        } 
      }
      rmdir($dir); 
    } 
  }

?>
