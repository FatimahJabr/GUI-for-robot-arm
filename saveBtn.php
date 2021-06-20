
<?php


/* 
 Open a Connection to MySQL:
 Before we can access data in the MySQL database,
 we need to be able to connect to the server
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


/** savimg the values of the input slider in variables  */
$motor1 = $_POST['motor1'];
$motor2 = $_POST['motor2'];
$motor3 = $_POST['motor3'];
$motor4 = $_POST['motor4'];
$motor5 = $_POST['motor5'];

/** checking which button was clicked */
if (isset($_POST['save'])) {
    # save-button was clicked
    // update the degrees col in the database with range input values
    $sqlUpdate = "UPDATE robot_arm 
    SET motor1=$motor1, motor2=$motor2, motor3=$motor3, motor4=$motor4, motor5=$motor5
    WHERE onOff=1 OR onOff=0" ;
    // check if the query was successull or not
    if ($connection->query($sqlUpdate) === TRUE) {
    echo "The motors degrees are updated successfully";
    } else {
    echo "Error: " . $sqlUpdate . "<br>" . $connection->error;
    }
}
elseif (isset($_POST['on'])) {
    # on-button was clicked
    // update the onOff col in the database to be 1
    $sqlOn = "UPDATE robot_arm 
    SET onOff=1
    WHERE onOff=1 OR onOff=0" ;

    // check if the query was successull or not
    if ($connection->query($sqlOn) === TRUE) {
    echo "The robot is ON";
    } else {
    echo "Error: " . $sqlOn . "<br>" . $connection->error;
    }
}
elseif (isset($_POST['off'])) {
    # off-button was clicked
    // update the onOff col in the database to be 0
    $sqlOff = "UPDATE robot_arm 
    SET onOff=0
    WHERE onOff=1 OR onOff=0" ;

    // check if the query was successull or not
    if ($connection->query($sqlOff) === TRUE) {
    echo "The robot is OFF";
    } else {
    echo "Error: " . $sqlOff . "<br>" . $connection->error;
    }
}


?>
