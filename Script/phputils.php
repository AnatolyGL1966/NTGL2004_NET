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
//        echo('<a      style="width:5%;float:right" href="http://www.ntgl2004.net/images/'.$filename.'" target="_blank" >');
//        echo('<img    style="width:20px;height:20px" src="Icons/Download.png"  alt="DownLoad" ></img>');
//        echo('</a>');
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

