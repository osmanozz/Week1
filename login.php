<?php

include "db.php";

$username = $_GET['username'];
$password = $_GET['password'];

echo "Username: " . $username . " Password: " . $password;
echo "<br>";


$myConn = new DB;
$username = addslashes($username);

$query = "SELECT * FROM user WHERE username = '$username' ";

$result = $myConn->executeSQL($query);

echo gettype($result);
echo "<br>";

if (!empty($result)) { 
    echo "<br> Login as $username <br>";
    print_r($result);

    // print_r geeft informatie over een variabele op een manier die door mensen kan gelezen worden.

} else {
    echo "<br> Invalid login! <br>";
}

// met ' OR '1'='1 print je alle records van je db.  

?>
