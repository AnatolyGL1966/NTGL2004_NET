<html >
  <head>
    <title>Full player example</title>
    <meta http-equiv="content-type" content="text/html;charset=windows-1255" /> 
    <!-- Uncomment the following meta tag if you have issues rendering this page on an intranet or local site. -->    
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"/> -->
   <script src="Script/movies.js" type="text/javascript"></script>
   
    </head>
    <body >        
      <article>
      <strong>MOVIES</strong>
   	  <br></br>
      <a  href="index.html">Home </a>
   	  <br></br>
      <div title="Error message area" id="errorMsg" style="color:Red;width:100%"></div>  
      <div title="Error message area" id="AjaxMessage" style="color:Red;width:100%"></div>  
	  <br></br>
      <?php
        require 'Script/phputils.php';
        error_reporting(E_ALL); 
        ShowImagesFiles(); 
      ?>
   </article>
 </body>
</html>