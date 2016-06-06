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
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <h1>User</h1>
    <table>
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
</body>
</html>