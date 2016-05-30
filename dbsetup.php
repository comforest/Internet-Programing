<?php // setup.php
//require_once 'functions.php';
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
createTable($connect, 'user',
            'userID INT UNSIGNED PRIMARY KEY,
            userName VARCHAR(30),
            INDEX(userName(6))');
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
createTable($connect, 'plan', 
            'planID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            userID VARCHAR(30),
            travelStart DATE, 
            travelEnd DATE, 
            hotelID VARCHAR(30), 
            lastLocation INT, 
            INDEX(userID)');
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
createTable($connect, 'route', 
            'routeID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            planID INT,
            routeDate DATE,
            INDEX(planID),
            INDEX(routeDate)');
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
createTable($connect, 'place',
            'placeID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            visitOrder INT,
            routeID INT,
            INDEX(routeID)');
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
createTable($connect, 'location',
            'locationID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            latitude DECIMAL(2, 10),
            longtitude DECIMAL(2, 10)');
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
?>
