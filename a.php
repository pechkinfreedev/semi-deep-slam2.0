<?php
   $cmd = "./Examples/Monocular/mono_semidense ./Vocabulary/ORBvoc.bin ./Examples/Monocular/TUM2.yaml ./rgbd_dataset_freiburg2_desk";
   while (@ ob_end_flush()); // end all output buffers if any

   $proc = popen($cmd, 'r');
   echo '<pre>';
   while (!feof($proc))
   {
       echo fread($proc, 4096);
       @ flush();
   }
   echo '</pre>';
?>
