<?php
//storing errors
$er = '';
//chcking whether querystring pass any error
if(isset($_GET['er']))
{
    //storing error into message
    $er = $_GET['er'];
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="html,css,javascript" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-1.12.2.js"></script>
	</head>
<body>