<?php 
// sql to update a record
include('../config.php');
include('validate.php');

if(isset($_POST['updatedata']))
{   
    $id = $_POST['update-id'];
    $username = $_POST['update-username'];
    $password = isset($_POST['update-password'])? $_POST['update-password'] : 0;
    $email = $_POST['update-email'];
    $contact = $_POST['update-contact'];
    $birthdate = $_POST['update-birthdate'];
    $address = $_POST['update-address'];
    
    // Validate user input
    if (empty($username) || empty($email) || empty($contact) || empty($birthdate) || empty($address)) {
        echo "Error: Please fill in all fields";
        exit();
    }
    
    if (strlen($username) > 50) {
        echo "Error: Username must be 50 characters or less";
        exit();
    }
    
    if (strlen($password) > 0 && strlen($password) < 8) {
        echo "Error: Password must be at least 8 characters";
        exit();
    }

    if (!validatePhoneNumber($contact)) {
        echo "Invalid Phone Number";
        exit();
    }
    
    // if (!preg_match('/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/', $contact)) {
    //     echo "Invalid Phone Number";
    //     exit();
    // }

    //If the user does not want to change the password, then keep the previous one.
    if(strlen($password) == 0){
        $sql = "UPDATE tbl_customer SET username=?, address=?, email=?, contact=?, birthdate=?, address=? WHERE id=?";
        // Use prepared statements
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $username, $address, $email, $contact, $birthdate, $address, $id);
    }
    
    else{
        // Hash the password
        $hashed_password = hash('sha256', $password);
        $sql = "UPDATE tbl_customer SET username=?, password=?, address=?, email=?, contact=?, birthdate=?, address=? WHERE id=?";
        
        // Use prepared statements
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $username, $hashed_password, $address, $email, $contact, $birthdate, $address, $id);
    }
    
    //Executing prepared statement
    if ($stmt->execute()) {
        echo '<script> alert("Data has been updated!"); </script>';
        header("Location:../customer-management.php");
    } else {
        // Use error handling
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>