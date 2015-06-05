<?php
  function MakeDiv($filename,$fileext,$ordernum)
  {
        echo('<div id="image"'.$ordernum.' style="width:100%">');      
        echo('	  <div id="imageVideo"'.$ordernum.' style="display:none;">images/'.$filename.'</div>');
        echo('<label  style="width:70%;float:left"> Video file '.$filename.' type '.$fileext.' </label>');
        echo('<button style="width:15%;float:left" id="loadVideo'.$ordernum.'" title="Load video button" onclick="getVideobyFileName('.'\''.$filename.'\''.')" >Load Video</button>');
        echo('<a      style="width:15%;float:right" href="http://www.ntgl2004.net/images/'.$filename.'" target="_blank" >DownLoad</a>');
        echo('</div>	');      
  }

  function MakeDiv4($filename,$fileext,$ordernum,$filesize)
  {
        echo('<div id="image"'.$ordernum.' style="width:100%">');      
        echo('	  <div id="imageVideo"'.$ordernum.' style="display:none;">images/'.$filename.'</div>');
        echo('<label  style="width:65%;float:left"> '.$filename.' type '.$fileext.' </label>');
        echo('<label  style="width:10%;float:left"> '.$filesize.' </label>');
        echo('<button style="width:15%;float:left" id="loadVideo'.$ordernum.'" title="Load video button" onclick="getVideobyFileName('.'\''.$filename.'\''.')" >Load Video</button>');
        echo('<input type="image" style="width:20px;float:left;height:20px" src="Icons/Download.png" onclick="DownLoadFileByXMLDoc('.'\''.$filename.'\''.')" alt="DownLoad" ></img>');
        echo('</div>');      
  }


    function MakeDiv5($filename,$fileext,$ordernum,$filesize,$filetime)
  {
        echo('<div id="image"'.$ordernum.' style="width:100%">');      
        echo('	  <div id="imageVideo"'.$ordernum.' style="display:none;">images/'.$filename.'</div>');
        echo('<label  style="width:45%;float:left"> '.$filename.' type '.$fileext.' </label>');
        echo('<label  style="width:10%;float:left"> '.$filesize.' </label>');
        echo('<label  style="width:25%;float:left"> '.$filetime.' </label>');
        echo('<button style="width:15%;float:left" id="loadVideo'.$ordernum.'" title="Load video button" onclick="getVideobyFileName('.'\''.$filename.'\''.')" >Load Video</button>');
        echo('<a      style="width:5%;float:right" href="View_movie.php?imagefilename='.$filename.'" target="_blank" >');
        echo('<img    style="width:15px;height:15px" src="Icons/Download.png"  alt="DownLoad" ></img>');
        echo('</a>');
        echo('</div>');      
  }


  function MakeDivShowImageFile($filename,$fileext,$ordernum,$filesize,$filetime)
  {
        echo('<div id="image"'.$ordernum.' style="width:100%">');      
        echo('<div id="imageVideo"'.$ordernum.' style="display:none;">images/'.$filename.'</div>');
        echo('<label  style="width:35%;float:left"> '.$filename.' </label>');
        echo('<label  style="width:10%;float:left"> '.$fileext.' </label>');
        echo('<label  style="width:10%;float:left"> '.$filesize.' </label>');
        echo('<label  style="width:25%;float:left"> '.$filetime.' </label>');
        echo('<a      style="width:5%;float:right" href="View_movie.php?imagefilename='.$filename.'" target="_blank" >');
        echo('<img    style="width:15px;height:15px" src="Icons/Download.png"  alt="DownLoad" ></img>');
        echo('</a>');
        echo('</div>');      
  }


  function ShowImagesFiles()
  {
      $dir    = 'images';
      $files2 = scandir($dir, 0);
      $lengtharr = count($files2);
      echo('<header>');
      if ($lengtharr > 0)
      {
       echo('<div id="HeaderImage" style="width:100%">');      
        echo('<label  style="width:35%;float:left">  File Name  </label>');
        echo('<label  style="width:10%;float:left">  Ext </label>');
        echo('<label  style="width:10%;float:left">  Size </label>');
        echo('<label  style="width:25%;float:left">  Date Time </label>');
        echo('<label  style="width:20%;float:right">  Action </label>');
        echo('<br></br>');
        echo('</div>');      
     }
     echo('</header>');
     echo('<section>');
     for ($index = 0;$index < $lengtharr;$index++)
     {
         $filename =  $files2[$index];
         if ((trim($filename) != "..") && (trim($filename) != "."))
         {
             $fileext = substr($filename,-3);
             $fileindex= $index+1;
             $filesize = human_filesize(filesize($dir."/".$filename));
             $filetime = date("d/m/y H:i:s",filemtime($dir."/".$filename));
             $filename_sz = $filesize;
             MakeDivShowImageFile($filename, $fileext, strval($fileindex),$filename_sz,$filetime);
             echo "<br>";
        }
     }  
     echo('</section>');
  }

function human_filesize($bytes, $decimals = 2)
{
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

function Login()
{
  $username = 'admin';
  $password = 'NT270504!';
  $LoginOk = false;
    while (!$LoginOk)
    {
      if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
      {
        if ($_SERVER['PHP_AUTH_USER'] == $username && $_SERVER['PHP_AUTH_PW'] == $password)
          $LoginOk = true;
        else 
          echo("Incorrect combination :name user - password");
      }
      if (!$LoginOk)
      {
        header('WWW-Authenticate: Basic realm="Restricted Section"');
        header('HTTP/1.0 401 Unauthorized');
        die ("Please enter your username and password");
      }
    }
}

?>

