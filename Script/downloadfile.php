<?php
 $errorMsg="Unknown Error";
 ignore_user_abort(true);
 set_time_limit(0); 
 $target_dir = "../images/";
 if (isset($_GET["downloadfilename"]))
 {
     $filename = $_GET['downloadfilename'];
     $target_file = $target_dir . basename($filename);
     if (!file_exists($target_file)) 
       $errorMsg = "File does not exist";
     else
     {
       header('Content-Description: File Transfer');
       header('Content-disposition: attachment; filename='.basename($target_file));
       header("Content-type: application/octet-stream");
       header('Expires: 0');
       header('Cache-Control: must-revalidate');
       header('Pragma: public');
       header('Content-Length: ' . filesize($target_file));
       ob_clean();
       flush();
       readfile($target_file);

       $errorMsg = $target_file;
//       exit();
     }
 } 
 else
 {
     $errorMsg = "parameter downloadfilename does not assigned ";
 }

 exit($errorMsg);
?>  


