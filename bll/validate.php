<?php
function validatePhoneNumber($phoneNumber) {
    // Regular expression to match most phone number formats including international numbers
    //$regex = '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';

    $regex = '/^[0-9]{10}+$/';
    return preg_match($regex, $phoneNumber);
}
?>