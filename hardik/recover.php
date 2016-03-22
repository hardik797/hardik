<?php

//including connection files
include('configs/database.php');

//take error variable for storing errors
$er = '';

//maintaining session
session_start();

//store session if foidd
$u_token = $_SESSION['toks'];
$u_id = $_SESSION['forgot_id'];
$u_mail = $_SESSION['forgot_mail'];
$length = 60; // time in seconds :: 60 = 1 minutes 
$time = strtotime("NOW"); // Create a time from a string 

if (isset($_SESSION['forgot_id']))
{

    //Check if user session expired or not
    $remain_time = (strtotime("now") - $_SESSION['time']);

    if (( $remain_time > $length))
    { 
        // if expired redirect to forgot menu while destroying all previous session
        
        unset($_SESSION['time']);
        header("location:forgotpassword.php?er=your session expired please try again"); 
        exit; 
    }
    else
    {
        $_SESSION['time'] = $time; 
    }
    
}
else
{       
    unset($_SESSION['forgot_id']);
    unset($_SESSION['forgot_mail']);
    header("location:forgotpassword.php?er=no forgot password request found for this email"); 
    exit; 
}

// to store id 
$f_id = '';
//checking whether id passed or not?
if (isset($_GET['token']))
{
    //storing url value to variable 
    $token = $_GET['token'];
    $er = "Set Password for user's email   :  ".$u_mail." where Token is :".$token;
    // checking whether id is not blank and token not mismatched
    if ($token != $u_token)	
    {
        //redirecting to users.php with error message if any
        $conn = "";
        unset($_SESSION['toks']);
        header('location:forgotpassword.php?er=Please do not try to cheat with query string');
        exit;
    }
    else
    {
        //getting user details for accurate updation of password
        $sql = "select id from tbl_users where email=?";
        //parameters array
        $param = array($u_mail);
        //firing query
        $qry = fetch_rows($sql, $param);
        //assigning id for accurate updatation
        $f_id = $qry[0]['id'];
    }
}//main $_GET if end here						
//checking for page submit
if (isset($_POST['set']))
{
    //salt for generating strong pw
    $salt = "!@#$%^&*()_+1234567890";
    //generating strongest hash for password
    $pass = md5(sha1($_POST['pass']).$salt);
    $cpass = md5(sha1($_POST['cpass']).$salt);
    //updating password details now for  $userid
    $sql = "update tbl_users set password=? where id=?";
    $uparam = array($cpass, $f_id);
    //checking whether password is not mismatched
    if ($pass != $cpass)
    {
        $er = "password mismatched please retry";
    }
    else
    {
        //firing query
        $qry = execute_query($sql, $uparam);    
        //checking whether query fired?
        if ($qry == 1)
        {
            //redirecting user to login page while destroying all the session
            $conn = "";
            header('location:index.php?er=new password set for '.$u_mail.'login now');
            exit;
            
        }
    //password verifier if end here    
    }

//form submit checker if end here
}


?>			
<html>
    <head>
        <title>Set_Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript,jQuery">
        <!-- styles -->
        <link rel="stylesheet" href="css/set_pass.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    </head>
<body>
    <div id="d">
    <span class="btn-danger">
    <?php
        //displaying error here
        echo $er;
    ?>
    </span><br><br>
    <form id="form" name="form" method="post"> 
        <label id="lbl">Set New Password Here!! :</label><br>
        <label id="lbl">Enter New Password:</label>
        <input class="ps" type="password" name="pass" id="pass" placeholder="new password" />
        <span class="glyphicon glyphicon-lock" ></span><br><br>
        <label id="lbl">Confirm Password:</label>
        <input class="ps" type="password" name="cpass" id="cpass" placeholder="confirm password" />
        <span class="glyphicon glyphicon-lock" ></span><br>
        <input id="submit" type="submit" class="btn btn-success" name="set" value="Set" />
    </form>
    </div>
<!-- JavaScripts -->
<script src="js/jquery-1.9.1.js" ></script>
<script src="js/jquery-1.12.0.min.js" ></script> 
<script src="js/bootstrap.min.js" ></script>
<script src="js/bootstrap.js" ></script>
<script type="text/javascript" >
//start checking on document refresh
$(document).ready(function() 
{
    //its called when form submited
    $("#form").submit(function() 
    {
        if($("#pass").val()=="" )  
        {  
            alert('password must required');  
            $("#pass").focus();
            return false;  
        }  
        else if($("#cpass").val()=="")  
        {  
            alert('confirm password must required');  
            $("#cpass").focus();
            return false;  
        }  
        else if($("#pass").val() != $("#cpass").val() )  
        {  
            alert('confirm password must required');  
            $("#cpass").focus();
            return false;  
        }  
        else  
        {  
            return true;  
        }  
    });
});
</script>
</body>
</html>
