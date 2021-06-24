<?php
$return_value="";
if(isset($_POST['data_process'])) {
    echo "this is api";
    $cmd = "./Examples/Monocular/mono_semidense ./Vocabulary/ORBvoc.bin ./Examples/Monocular/TUM2.yaml ./data/1datafile";
    while (@ ob_end_flush()); // end all output buffers if any

    $proc = popen($cmd, 'r');
    echo '<pre>';
    while (!feof($proc))
    {
       echo  fread($proc, 4096);
       @ flush();
    }
    echo '</pre>';
    echo 'what is result';
}

?>
