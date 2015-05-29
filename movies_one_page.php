<html >
  <head>
    <title>Full player example</title>
    <meta http-equiv="content-type" content="text/html;charset=windows-1255" /> 
    <!-- Uncomment the following meta tag if you have issues rendering this page on an intranet or local site. -->    
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"/> -->
   <script src="Script/movies.js" type="text/javascript"></script>
   
    </head>
    <body onload="init();" >        
    <br></br>
    <strong>MOVIES</strong>
    <a  href="index.html">Home </a>
    <br></br>
    <br></br>

    <video id="Video1" controls style="border: 1px solid blue;" height="240" width="100%" title="video element">            
         HTML5 Video is required for this example
    </video>
    
    <div id="buttonbar" style="display: none;">
        <button id="restart" title="Restart button">[]</button> 
        <button id="slower" title="Slower playback button">-</button> 
        <button id="rew" title="Rewind button" >&lt;&lt;</button>
        <button id="play" title="Play button">&gt;</button>
        <button id="fwd" title="Forward button" >&gt;&gt;</button>
        <button id="faster" title="Faster playback button">+</button>
        <button id="mute" title="Mute button" ><img alt="Mute button" src="vol2.png" /></button>     
        <br />
        <!-- <label>Playback </label> -->
        <label>Reset playback rate: </label>
		<button id="normal" title="Reset playback rate button">=</button>    
        <label>  Volume </label>
            <button id="volDn"  title="Volume down button">-</button>
            <button id="volUp"  title="Volume up button">+</button>
    </div>   
    <br/>  
    <div id= "inputField" style="display:none;width:100%" >
        <label style="width:100%;float:left">Type or paste a video URL: </label>
		<br></br>
        <input type="text" id="imageVideo0" style="width: 80%;float:left;"  title="video file input field" value="http://ie.microsoft.com/testdrive/ieblog/2011/nov/pp4_blog_demo.mp4" />        
        <button id="loadVideo" title="Load video button" style="width: 20%;float:right;" onclick="getVideobyValueId(0)" >Load</button>
    </div>
	<br></br>
    <div title="Error message area" id="errorMsg" style="color:Red;width:100%"></div>  
	<br></br>
<?php
  require 'Script/phputils.php';
  $dir    = 'images';
  $files2 = scandir($dir, 0);

  $lengtharr = count($files2);
  for ($index = 0;$index < $lengtharr;$index++)
  {
      $filename =  $files2[$index];
      if ((trim($filename) != "..") && (trim($filename) != "."))
      {
        $fileext = substr($filename,-3);
        $fileindex= $index+1;
        $filesize = human_filesize(filesize($dir."/".$filename));
        $filename_sz = $filesize;
        MakeDiv5($filename, $fileext, strval($fileindex),$filename_sz);
        echo "<br>";
      }
   }
?>
 </body>
</html>