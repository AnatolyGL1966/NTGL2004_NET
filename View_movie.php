<!DOCTYPE HTML> 
<html >
<head>
   <title>View Movie</title>
   <meta http-equiv="content-type" content="text/html;charset=windows-1255" /> 
   <script src="Script/movies.js" type="text/javascript"></script>  
</head>
<body onload="init();" >        
<form action="Script/downloadfile.php" method="get">  

    <video id="Video1" controls style="border: 1px solid blue;" height="240" width="100%" title="video element">            
         HTML5 Video is required for this example
    </video>
    
    <div id="buttonbar" style="display: none;">
        <button type="button" id="restart" title="Restart button">[]</button> 
        <button type="button" id="slower" title="Slower playback button">-</button> 
        <button type="button" id="rew" title="Rewind button" >&lt;&lt;</button>
        <button type="button" id="play" title="Play button">&gt;</button>
        <button type="button" id="fwd" title="Forward button" >&gt;&gt;</button>
        <button type="button" id="faster" title="Faster playback button">+</button>
        <button type="button" id="mute" title="Mute button" ><img alt="Mute button" src="vol2.png" /></button>     
        <br />
        <label>Reset playback rate: </label>
		<button type="button" id="normal" title="Reset playback rate button">=</button>    
        <label>  Volume </label>
            <button type="button" id="volDn"  title="Volume down button">-</button>
            <button type="button" id="volUp"  title="Volume up button">+</button>
    </div>   
    <br/>  
    <div title="Error message area" id="errorMsg" style="color:Red;width:100%"></div>  
    <div title="Error message area" id="AjaxMessage" style="color:Red;width:100%"></div>  
	<br></br>
<?php
  //require 'Script/phputils.php';
   
   if (isset($_GET["imagefilename"]))
   {
       $filename = $_GET["imagefilename"];
       echo(' <div id= "inputField" style="display:none;width:100%" >');
       echo(' <label style="width:100%;float:left">Video file URL: </label>');
	   echo(' <br></br> ');
       echo(' <input type="text" name="downloadfilename" id="imageVideo0" style="width: 60%;float:left;"  title="video file input field" value="'.$filename.'" /> ');
       echo(' <button type="button" id="loadVideo" title="Load video button" style="width: 18%;float:left;" onclick="getVideobyFileName(\''.$filename.'\')" >Load Video </button>');
       echo('<input type="submit" id="downloadfilename" value=" Download file " style="width: 20%;float:right;">');
       echo('</div>');
	   echo('<br></br>');
       unset($_GET["imagefilename"]);
   }
?>
  
</form>

</body>
</html>