<?php
/* 
 Openinf a Connection to MySQL
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_methods";

// Create connection
$connection = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
} 

// query to select all col from the DB
$sql = "SELECT * FROM robot_arm";
//saving the result of the query
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "motor1: " . $row["motor1"]. "<br>" .
         "motor2: " . $row["motor2"]. "<br>" .
         "motor3: " . $row["motor3"]. "<br>" .
         "motor4: " . $row["motor4"]. "<br>" .
         "motor5: " . $row["motor5"]. "<br>" .
         "ON / OFF: " . $row["onOff"]. "<br>";
  }
} else {
  echo "0 results";
}
?>