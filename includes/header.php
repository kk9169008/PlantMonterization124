<!-------------------------------------------------------

Webpage: header.php
File Version: 1.0.1 (Release.ConfirmedVersion.CurrentVersion)
Author: Kris Kingston

---------------------------------------------------------

Description of the page:header include link JS CSS chart JQuriy countdown JS fonts
--------------------------------------------------------->
<!DOCTYPE html>
<?php
session_start ()?>
<head>
<meta charset="utf-8">
<title><?php echo $page ?></title>

<!-- link to favicon -->
<link href="../images/favicon.ico" rel="shortcut icon" />
<!-- link to external CSS -->
<!-- bootstrap-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/graph.css">
<link rel="stylesheet" href="../css/main.css">

<!-- morris chart -->
<script
	src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>

<!-- flip clock for countdown -->
<link rel="stylesheet" href="../css/flipclock.css">

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="../css/flipclock.js"></script>

<!-- enable HTML5 in IE 8 and below -->
<!--[if IE]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
<!-- font -->
<link href='http://fonts.googleapis.com/css?family=Ubuntu'
	rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Roboto"
	rel="stylesheet">


</head>
<body>
