<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/static/css/style.css">
	<link rel="stylesheet" type="text/css" href="/static/css/navbar_style.css">
	<link rel="stylesheet" type="text/css" href="/static/css/dialog.css">
	<link rel="stylesheet" type="text/css" href="/static/css/tourlist.css">
	<link rel="stylesheet" type="text/css" href="/static/css/datebar.css">
	<link rel="stylesheet" type="text/css" href="/static/css/tab.css">
    <link rel="stylesheet" type="text/css" href="/static/css/detailView.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <h1>User</h1>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>userID</th>
                            <th>userName</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
                            $que = "SELECT * FROM user";
                            $result = mysqli_query($connect, $que);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['userID'].'</td>';
                                echo '<td>'.$row['userName'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <h1>Plan</h1>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>planID</th>
                            <th>userID</th>
                            <th>travelStart</th>
                            <th>travelEnd</th>
                            <th>hotelID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
                            $que = "SELECT * FROM plan";
                            $result = mysqli_query($connect, $que);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['planID'].'</td>';
                                echo '<td>'.$row['userID'].'</td>';
                                echo '<td>'.$row['travelStart'].'</td>';
                                echo '<td>'.$row['travelEnd'].'</td>';
                                echo '<td>'.$row['hotelID'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <h1>Route</h1>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>routeID</th>
                            <th>planID</th>
                            <th>routeDate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
                            $que = "SELECT * FROM route";
                            $result = mysqli_query($connect, $que);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['routeID'].'</td>';
                                echo '<td>'.$row['planID'].'</td>';
                                echo '<td>'.$row['routeDate'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <h1>Place</h1>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>placeID</th>
                            <th>routeID</th>
                            <th>googleID</th>
                            <th>name</th>
                            <th>lat</th>
                            <th>lng</th>
                            <th>visitOrder</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
                            $que = "SELECT * FROM place";
                            $result = mysqli_query($connect, $que);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['placeID'].'</td>';
                                echo '<td>'.$row['routeID'].'</td>';
                                echo '<td>'.$row['googleID'].'</td>';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['lat'].'</td>';
                                echo '<td>'.$row['lng'].'</td>';
                                echo '<td>'.$row['visitOrder'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>