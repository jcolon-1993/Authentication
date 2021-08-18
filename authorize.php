<?php
  // User name and password for authentication
  $username = 'rock';
  $password = 'roll';

  // The user name and are checked against the required ones
  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
      ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password))
  {
    // The user name/password are incorrect so send the authentication headers
    // These header are sent to the browser
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Guitar Wars"');
    // Displays denial message if password and username are incorrect.
    exit('<h2>Guitar Wars</h2>Sorry, you must enter a valid user name and
    password to access this page.');
  }
?>
