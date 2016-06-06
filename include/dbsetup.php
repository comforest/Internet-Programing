<?php // setup.php
//require_once 'functions.php';
createTable($connect, 'user',
            'userID CHAR(16) PRIMARY KEY,
            userName VARCHAR(30),
            INDEX(userName(6))');
createTable($connect, 'plan', 
            'planID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            userID CHAR(16),
            travelStart DATE, 
            travelEnd DATE,
            hotelName VARCHAR(30),
            hotelID CHAR(40), 
            hotelCity VARCHAR(30),
            lastLocation INT, 
            INDEX(userID(6))');
createTable($connect, 'route', 
            'routeID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            planID INT,
            routeDate DATE,
            INDEX(planID),
            INDEX(routeDate)');
createTable($connect, 'place',
            'placeID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            visitOrder INT,
            routeID INT,
            INDEX(routeID)');
createTable($connect, 'location',
            'locationID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            latitude DECIMAL(12, 10),
            longtitude DECIMAL(12, 10)');
?>
