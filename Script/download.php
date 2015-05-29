<?php
/**
* // local_file = 'file.zip';
* // download_file = 'name.zip';
*/
function Download_File_By_rate ( $local_file, $download_file)
{
    // set the download rate limit (=> 20,5 kb/s)
    $download_rate = 20.5;
    if (file_exists($local_file) && is_file($local_file)) {
          header('Cache-control: private');
          header('Content-Type: application/octet-stream');
          header('Content-Length: '.filesize($local_file));
          header('Content-Disposition: filename='.$download_file);

          flush();
          $file = fopen($local_file, "r");
        while (!feof($file)) {
              // send the current file part to the browser
              print fread($file, round($download_rate * 1024));
              // flush the content to the browser
              flush();
              // sleep one second
              sleep(1);
         }
         fclose($file);
    }
    else
     die('Error: The file '.$local_file.' does not exist!');
}


 /**
 * Copy remote file over HTTP one small chunk at a time.
 *
 * @param $infile The full URL to the remote file
 * @param $outfile The path where to save the file
 */
function Copyfile_chunked ($infile, $outfile)
{
    $chunksize = 10 * (1024 * 1024); // 10 Megs

    /**
     * parse_url breaks a part a URL into it's parts, i.e. host, path,
     * query string, etc.
     */
    $parts = parse_url($infile);
    $i_handle = fsockopen($parts['host'], 80, $errstr, $errcode, 5);
    $o_handle = fopen($outfile, 'wb');

    if ($i_handle == false || $o_handle == false) {
        return false;
    }

    if (!empty($parts['query'])) {
        $parts['path'] .= '?' . $parts['query'];
    }

    /**
     * Send the request to the server for the file
     */
    $request = "GET {$parts['path']} HTTP/1.1\r\n";
    $request .= "Host: {$parts['host']}\r\n";
    $request .= "User-Agent: Mozilla/5.0\r\n";
    $request .= "Keep-Alive: 115\r\n";
    $request .= "Connection: keep-alive\r\n\r\n";
    fwrite($i_handle, $request);

    /**
     * Now read the headers from the remote server. We'll need
     * to get the content length.
     */
    $headers = array();
    while (!feof($i_handle)) {
        $line = fgets($i_handle);
        if ($line == "\r\n") break;
        $headers[] = $line;
    }

    /**
     * Look for the Content-Length header, and get the size
     * of the remote file.
     */
    $length = 0;
    foreach ($headers as $header) {
        if (stripos($header, 'Content-Length:') === 0) {
            $length = (int)str_replace('Content-Length: ', '', $header);
            break;
        }
    }

    /**
     * Start reading in the remote file, and writing it to the
     * local file one chunk at a time.
     */
    $cnt = 0;
    while (!feof($i_handle)) {
        $buf = '';
        $buf = fread($i_handle, $chunksize);
        $bytes = fwrite($o_handle, $buf);
        if ($bytes == false) {
            return false;
        }
        $cnt += $bytes;

        /**
         * We're done reading when we've reached the conent length
         */
        if ($cnt >= $length) break;
    }

    fclose($i_handle);
    fclose($o_handle);
    return $cnt;
}

function downloadFile()
{

 $errorMsg="Unknown Error";
 $safeFilename = '/^\w+\.\w+$/';
 $target_dir = "../Images/";
 ignore_user_abort(true);
 set_time_limit(0); // disable the time limit for this script
 
 if (isset($_GET["imagefilename"]))
 {
    $filename = $_GET['imagefilename'];
    if (!preg_match($safeFilename, $filename)) 
      $errorMsg ="Bad filename";
    else
    {
      $target_file = $target_dir . basename($filename);
     if (!file_exists($target_file)) 
       $errorMsg = "File does not exist";
     else
     {
       header('Content-Description: File Transfer');
       header('Content-disposition: attachment; filename='.basename($filename));
       header("Content-type: application/octet-stream");
       header('Expires: 0');
       header('Cache-Control: must-revalidate');
       header('Pragma: public');
       header('Content-Length: ' . filesize($filename));
       readfile($target_file);
     }
   } 
 }
 else
 {
     $errorMsg = "parameter imagefilename does not assigned ";
 }
 exit($errorMsg);
}

function downloadFile2()
{

 $errorMsg="Unknown Error";
 $safeFilename = '/^\w+\.\w+$/';
 ignore_user_abort(true);
 set_time_limit(0); // disable the time limit for this script
  if (isset($_GET["imagefilename"]))
 {
     $filename = $_GET['imagefilename'];
     if (!file_exists($target_file)) 
       $errorMsg = "File does not exist";
     else
     {
       header('Content-Description: File Transfer');
       header('Content-disposition: attachment; filename='.basename($filename));
       header("Content-type: application/octet-stream");
       header('Expires: 0');
       header('Cache-Control: must-revalidate');
       header('Pragma: public');
       header('Content-Length: ' . filesize($filename));
       ob_clean();
       flush();
       readfile($target_file);
       exit;
     }
   } 
 }
 else
 {
     $errorMsg = "parameter imagefilename does not assigned ";
 }
 exit($errorMsg);
}

?>  


