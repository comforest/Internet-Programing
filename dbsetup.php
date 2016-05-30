<?php // setup.php
require_once 'functions.php';

createTable('user',
            'userID INT UNSIGNED PRIMARY KEY,
            userName VARCHAR(30),
            INDEX(userName(6))');

createTable('plan', 
            'planID INT UNSIGNED AUTO_INCREMENT,
            userID VARCHAR(30),
            travelStart DATE, 
            travelEnd DATE, 
            hotelID VARCHAR(30), 
            lastLocation INT, 
            INDEX(userID)');

createTable('route', 
            'routeID INT UNSIGNED AUTO_INCREMENT,
            planID INT,
            routeDate DATE,
            INDEX(planID),
            INDEX(routeDate)');

createTable('place',
            'placeID INT UNSIGNED AUTO_INCREMENT,
            visitOrder INT,
            routeID INT,
            INDEX(routeID)');

createTable('location',
            'locationID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            latitude DECIMAL(2, 10),
            longtitude DECIMAL(2, 10)');
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
?>
