<?php
$errormsg="";
$debugerror="";
$filesizelimit = 50;    
$target_dir = "../Uploads/";
$target_file ="";
$fileuploadlimit = $filesizelimit*1024*1024;
$imageFileType ="";
$uploadOk = 1;
$sourceuploadid = 1;

$filetype = 0;

if(isset($_POST["submit"])) 
{
   if (isset($_FILES["fileToUpload"]["name"]))
   {
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);   
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      if (file_exists($target_file)) 
      {
         $errormsg =$errormsg. "Sorry, file already exists.";
         $uploadOk = 2;
      }
   }

   if (isset($_POST["filesize"]))
   {
      $filesizelimit = $_POST["filesize"];
      $fileuploadlimit = $filesizelimit*1024*1024;
   }

   if (isset($_POST["filetype"]))
   {
       $filetype = $_POST["filetype"];
   }
   else
   {
       $errormsg =$errormsg. "Sorry, you have to select file type";
       $uploadOk = 3;      
   }

   // Check file size
   if ($_FILES["fileToUpload"]["size"] > $fileuploadlimit) 
   {
      $errormsg =$errormsg. "Sorry, your file is too large.";
      $uploadOk = 4;
   }

   // Allow certain file formats
   switch($filetype)
   {
       case 0:{
               if  (strtolower($imageFileType) != "jpg"  && 
                    strtolower($imageFileType) != "png"  && 
                    strtolower($imageFileType) != "jpeg" && 
                    strtolower($imageFileType) != "gif" ) 
                  {
                     $errormsg =$errormsg. "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                     $uploadOk = 5;
                  }
             } break;
       case 1:{
               if  (strtolower($imageFileType) != "avi" ) 
                  {
                     $errormsg =$errormsg. "Sorry, only AVI files are allowed.";
                     $uploadOk = 6;
                  }
             } break;
       case 2:{
               if  (strtolower($imageFileType) != "mp3" ) 
                  {
                     $errormsg =$errormsg. "Sorry, only MP3 files are allowed.";
                     $uploadOk = 7;
                  }
             } break;
       case 3:{
               if  (strtolower($imageFileType) != "mov" ) 
                  {
                     $errormsg =$errormsg.  "Sorry, only MOV files are allowed.";
                     $uploadOk = 8;
                  }
             } break;
       case 4:{
               if  (strtolower($imageFileType) != "mp4" ) 
                  {
                     $errormsg =$errormsg.  "Sorry, only MP4 files are allowed.";
                     $uploadOk = 9;
                  }
             } break;
         default:break;
   }

   if (isset($_POST["sourceid"])
   {
       $sourceuploadid = $_POST["sourceid"];
   }
}
else
  $uploadOk = 0;

if ($uploadOk == 1)
{
// if everything is ok, try to upload file
    error_reporting(E_ALL);
    ini_set('upload_max_filesize', '15M');
    ini_set('post_max_size', '15M');
    ini_set('max_input_time', 300);
    ini_set('max_execution_time', 300);
    $debugerror = $debugerror. "file to upload";
    $debugerror = $debugerror. "<br>";
    $debugerror = $debugerror. $_SERVER['SERVER_NAME'];
    $debugerror = $debugerror. "<br>";
    $debugerror = $debugerror. $target_file;
    $debugerror = $debugerror. "<br>";
    $debugerror = $debugerror. $_FILES["fileToUpload"]["tmp_name"];
    $debugerror = $debugerror. "<br>";

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
      $errormsg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    else
      $errormsg = "Sorry, there was an error uploading your file.";
}
else
{
    $errormsg =$errormsg.  "Sorry, your file was not uploaded. error code "  . $uploadOk;    
}
    if (sourceuploadid ==1)
      header('Location:../UploadFile.php?errormsg='.$errormsg, true, 301 );
    else if (sourceuploadid ==2)
      header('Location:../UploadFile_one_page.php?errormsg='.$errormsg, true, 301 );
    exit($errormsg);

?>
<?php 
error_reporting(E_ALL); //Will help you debug a [server/path/permission] issue
Class uploadHandler{
    public $upload_path;
    public $full_path;
    public $name;
    public $size;
    public $ext;
    public $output;
    public $input;
    public $prefix;
    private $allowed;

    function upload(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_FILES[$this->input]['error'])){
                if($_FILES[$this->input]['error'] == 0){
                    $this->name      = basename($_FILES[$this->input]['name']);
                    $file_p          = explode('.', $this->name);
                    $this->ext       = end($file_p);
                    $this->full_path = rtrim($this->upload_path,'/').'/'.preg_replace('/[^a-zA-Z0-9.-]/s', '_', $this->prefix.'_'.$file_p[0]).'.'.$this->ext;
                    $info            = getimagesize($_FILES[$this->input]['tmp_name']);
                    $this->size      = filesize($_FILES[$this->input]['tmp_name']);

                    if($info[0]>$this->allowed['dimensions']['width'] || $info[1] > $this->allowed['dimensions']['height']){
                        $this->output = 'File dimensions too large!';
                    }else{
                        if($info[0] > 0 && $info[1] > 0 && in_array($info['mime'],$this->allowed['types'])){
                            move_uploaded_file($_FILES[$this->input]['tmp_name'],$this->full_path);
                            $this->output = 'Upload success!';
                        }else{
                            $this->output = 'File not supported!';
                        }
                    }
                }else{
                    if($_FILES[$this->input]['error']==1){$this->output = 'The uploaded file exceeds the upload_max_filesize directive!';}
                    if($_FILES[$this->input]['error']==2){$this->output = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in our HTML form!';}
                    if($_FILES[$this->input]['error']==3){$this->output = 'The uploaded file was only partially uploaded!';}
                    if($_FILES[$this->input]['error']==4){$this->output = 'No file was uploaded!';}
                    if($_FILES[$this->input]['error']==6){$this->output = 'Missing a temporary folder!';}
                    if($_FILES[$this->input]['error']==7){$this->output = 'Failed to write uploaded file to disk!';}
                    if($_FILES[$this->input]['error']==8){$this->output = 'A PHP extension stopped the file upload!';}
                }
            }
        }
    }

    function setPath($var){
        $this->upload_path = $var;
    }
    function setAllowed($var=array()){
        $this->allowed = $var;
    }
    function setFilePrefix($var){
        $this->prefix = preg_replace('/[^a-zA-Z0-9.-]/s', '_', $var);
    }
    function setInput($var){
        $this->input = $var;
    }

}



//Start class
$upload = new uploadHandler();
//Set path
$upload->setPath('./');
//Prefix the file name
$upload->setFilePrefix('user_uploads');
//Allowed types
$upload->setAllowed(array('dimensions'=>array('width'=>200,'height'=>200),
                          'types'=>array('image/png','image/jpg','image/gif')));
//form property name                   
$upload->setInput('myfile');
//Do upload
$upload->upload();


//notice
if(isset($upload->output)){
    echo $upload->output;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html;charset=windows-1255" /> 
        <title>Script Upload File</title>
    </head>
    <body>
        <?php
           echo $debugerror;
           echo "<br>" ;
           echo $errormsg;
        ?>
        <a  href="../UploadFile.php">Back </a>
    </body>
</html>
