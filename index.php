<!DOCTYPE html>
<html>
<head>
        <title>MySQL Table Viewer</title>
</head>
<body>
        <h1>MySQL Table Viewer-App Svc</h1>




<?php

// Enable error reporting to display errors and warnings
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 $servername = "glprj-mysqlsvr-db1.mysql.database.azure.com";
 $username = "msazmysqladmin";
 $password = "kvkdbpwd_85";
 $dbname = "glprjmysqldb1";
 $port = 3306;

 // Define the path to the SSL certificate
  $ssl_cert_path = "/etc/ssl/certs/BaltimoreCyberTrustRoot.crt.pem"; // Ensure the path is correct

 $conn = mysqli_init();

 // Set SSL options for secure connection, but disable server certificate verification
  mysqli_ssl_set($conn, NULL, NULL, $ssl_cert_path, NULL, NULL);
  mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

  // Establish a secure connection to the MySQL server
  if (!mysqli_real_connect($conn, $servername, $username, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT)) {
      die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
      } else {


      }



  $sql = "SELECT emp_no, first_name, email_id FROM employees LIMIT 50";
  $result = $conn->query($sql);



  if ($result->num_rows > 0) {
              // Display table headers
     echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
                   // Loop through results and display each row in the table
                       while ($row = $result->fetch_assoc()) {
                               echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["email_id"] . "</td></tr>";
                                   }
                                       echo "</table>";
                                       } else {
                                           echo "0 results";
                                           }

$conn->close();

?>
</body>


<html>