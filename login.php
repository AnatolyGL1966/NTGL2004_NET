<?php
  $username = 'admin';
  $password = 'NT270504!';
  $LoginOk = false;
    while (!$LoginOk)
    {
      if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
      {
        if ($_SERVER['PHP_AUTH_USER'] == $username && $_SERVER['PHP_AUTH_PW'] == $password)
        {
          echo "Registration successful";
          $LoginOk = true;
        }
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
?>

