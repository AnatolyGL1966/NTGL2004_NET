function showGETResponse(aReq,aIdName,phpfilename,tagname)
{
    if (aReq.length==0) 
    { 
      document.getElementById(aIdName).innerHTML="";
      return;
    } 
    else
    {
       var xmlhttp=new XMLHttpRequest();
       xmlhttp.onreadystatechange=function() {
       if (xmlhttp.readyState==4 && xmlhttp.status==200) 
       {
            document.getElementById(aIdName).innerHTML=xmlhttp.responseText;
       }
     }
     xmlhttp.open("GET",phpfilename +"?"+ tagname + "="+aReq,true);
     xmlhttp.send();
    }    
}


function showPostResponse(aReq,aIdName,phpfilename,tagname)
{
    if (aReq.length==0) 
    { 
      document.getElementById(aIdName).innerHTML="";
      return;
    } 
    else
    {
       var xmlhttp=new XMLHttpRequest();
       xmlhttp.onreadystatechange=function() {
       if (xmlhttp.readyState==4 && xmlhttp.status==200) 
       {
            document.getElementById(aIdName).innerHTML=xmlhttp.responseText;
       }
     }
     xmlhttp.open("POST",phpfilename +"?"+ tagname + "="+aReq,true);
     xmlhttp.send();
    }    
}

function DownLoadFileByXMLDoc(aFileName)
{
    try
    {
       var xmlhttp;
       if (window.XMLHttpRequest)
       {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
       }
       else
       {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function ()
       {
           if (xmlhttp.readyState == 0)
               alert('request not initialized');
           else if (xmlhttp.readyState == 1)
               alert('server connection established');
           else if (xmlhttp.readyState == 2)
               alert(' request received');
           else if (xmlhttp.readyState == 3)
               alert('processing request');
           else if (xmlhttp.readyState == 3)
               alert('request finished and response is ready ');
           if (xmlhttp.readyState == 4 && xmlhttp.status != 200)
               alert(' Error: '+ xmlhttp.status);
           if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
           {
               alert('request finished and response is ready .Respose Text = ' + xmlhttp.responseText);
               document.getElementById("AjaxMessage").innerHTML = xmlhttp.responseText;
           }
       }
       xmlhttp.open("GET","/Script/downloadfile.php?imagefilename="+aFileName,true);
       xmlhttp.send();
    }
    catch(err)   
    {
        alert(err.Message);
    }
}