<!DOCTYPE html>
<html>
    <head>
        <title>Upload movies</title>
    </head>
 <body>
     <form action="Script/upload.php" method="post" enctype="multipart/form-data">
     <?php 
       if (isset($_GET["errormsg"]))
       {
          echo $_GET["errormsg"]; 
       }
     ?><br>
     <a  href="index.html">Home </a><br>
    Select image to upload:
    <input type="hidden" name="sourceid" id="fileToUploadid" value="2">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
     <select name="filetype">
        <option value="0">Icons</option>
        <option value="1">AVI</option>
        <option value="2">MP3</option>
        <option value="3">MOV</option>
        <option value="4">MP4</option>
     </select>
</form>
</body>
</html>
