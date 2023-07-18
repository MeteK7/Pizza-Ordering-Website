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
       $password =  $_REQUEST['userpassword'];
       $email = $_REQUEST['email'];
       $contact = $_REQUEST['contact'];
       $address = $_REQUEST['address'];

      // Validate user input
       if (empty($username) || empty($password) || empty($email)) {
          echo "Error: Please fill in all fields";
          exit();
      }

      if (strlen($username) > 50) {
          echo "Error: Username must be 50 characters or less";
          exit();
      }

      if (strlen($password) < 8) {
          echo "Error: Password must be at least 8 characters";
          exit();
      }

      // Get date
      $date = date('Y-m-d H:i:s');
      
      // Hash the password
      $hashed_password = hash('sha256', $password);

      // Use prepared statements
      $sql = "INSERT INTO tbl_customer (username, password, email, contact, address, creationdate) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssssss", $username, $hashed_password, $email, $contact, $address, $date);

      if ($stmt->execute()) {
          echo "New record created successfully";
      } else {
          // Use error handling
          echo "Error: " . $stmt->error;
      }

      $stmt->close();
      $conn->close();
      ?>
  </center>
</body>

</html>

<!--https://www.geeksforgeeks.org/how-to-insert-form-data-into-database-using-php/-->
<!--https://www.w3schools.com/php/php_mysql_insert.asp-->