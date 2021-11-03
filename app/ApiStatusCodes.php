<?php

namespace App;

class ApiStatusCodes {

    static $success = "0_SUCCESS";
    static $failed = "1_FAILED";

    // User Authentication
    static $loginFailed = "1000_LOGIN-FAILED";
    static $incorrectPassword = "1001_INCORRECT-PASSWORD";
    static $emailNotFound = "1002_EMAIL-NOT-FOUND";
    static $emailAvailable = "1003_EMAIL-AVAILABLE";
    static $emailIsNotAvailable = "1004_EMAIL-IS-NOT-AVAILABLE";
    static $passwordChanged = "1005_PASSWORD-CHANGED";
    static $passwordNotChanged = "1005_PASSWORD-NOT-CHANGED";

    // Customer
    static $customerCreated = "1100_USER-CREATED";
    static $customerNotCreated = "1101_USER-NOT-CREATED";
}

?>
