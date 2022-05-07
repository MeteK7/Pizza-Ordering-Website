<!DOCTYPE html>
<html>
  
<head>
    <title>Customer Registration</title>
</head>
  
<body>
    <center>
        <!--MySQLi Data Insertion Object-oriented-->
        <?php
        include "config.php";

        // Taking all 3 values from the form data(input)
        $username =  $_REQUEST['username'];
        $password =  $_REQUEST['password'];
        $address = $_REQUEST['address'];

        $sql = "INSERT INTO tbl_customer (username, password, address)
VALUES ('$username','$password','$address')";
          
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