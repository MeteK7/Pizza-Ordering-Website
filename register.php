<!DOCTYPE html>
<html>
  
<head>
    <title>Customer Registration</title>
</head>
  
<body>
    <center>
        <!--MySQLi Data Insertion Object-oriented-->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "mg9R7psU";
        $database='pizza_ordering_website';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

          
        // Taking all 2 values from the form data(input)
        $username =  $_REQUEST['username'];
        $address = $_REQUEST['address'];

        $sql = "INSERT INTO tbl_customer (username, address)
VALUES ('$username','$address')";
          
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
    </center>
</body>
  
</html>

<!--https://www.geeksforgeeks.org/how-to-insert-form-data-into-database-using-php/-->
<!--https://www.w3schools.com/php/php_mysql_insert.asp-->