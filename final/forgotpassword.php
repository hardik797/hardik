<?php

    //including required files
    include('config.php');
        
    
    //for stroing error
    $er = '';
    //check whether qerystring passed anything
    if(isset($_GET['er']))
    {
        //stroing error
        $er = $_GET['er'];
    }

    //checking whether page is submited or not?
    if (isset($_POST['forgot']))
    {

        //fetching posted data and store it to variables
        $user_email = $_POST['user_email'];	
        				
        //checking whether login is user
        $sql = "SELECT id, email, username FROM tbl_users WHERE email = ? ";

        $param = array($user_email);
        //firing query

        $qry = fetch_rows($sql, $param);

        //check whether any row present in database with given id
        $res = count($qry);
        
        //checking number of rows
        if ($res != 1)
        {
            $er = "No email found please try another email or register";
        }
        else
        {            
            //storing required data to variable
            $user_id = $qry[0]['id'];
            $mail = $qry[0]['email'];

            
            //generating & storing session
            session_start();
            
            //session id
            $_SESSION['forgot_id'] = $user_id;
            $_SESSION['forgot_mail'] = $mail;

            //generating random token
            /*$random = bin2hex(openssl_random_pseudo_bytes(4));*/

            $token = md5(time(0.0009));

            $random = substr($token, 15, 6);
            
            //session token
            $_SESSION['toks'] = $random;
            
            //passing this value for forgot verification
            $token = $_SESSION['toks'];

            $time = strtotime("now"); //Create a time from a string 

            //If no session time is created, create one 
            if (!isset($_SESSION['time']))
            {  
        
                //create time limited session 
                $_SESSION['time'] = $time;  
            }
            
            //checking whether forgot request from user or admin
            if ( isset( $_SESSION['forgot_id'] ) )
            {                
                //redirecting to recover page for user
                header('location:recover.php?token='.$token);

            }
            
        //num rows check end here
        }
        
        
    //main if end here
    }

//terminating PDO connection
$conn = "";

?>

<html>

	<head>

		<title>Recover_Password</title>

			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="keywords" content="HTML,CSS,XML,JavaScript,jQuery">


					<link rel="stylesheet" href="css/forgot.css" type="text/css" />
					<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
					<link rel="stylesheet" href="css/bootstrap.css" type="text/css">

</head>

	<body>

<div class="container">

    <div class="row">
	
        <div id="d">

            <span class="btn-danger">

            <?php
            
                //print error here
                echo $er;
            
                

            ?>

            </span><br><br>

                <form id="form" name="form" role="form" class="form" method="post"> 
                    
                    <label>Recover Password Here!! :</label> &nbsp;<br><br>	
                    
                        <label>Enter Username or Email :</label> &nbsp;
                    
                            <input type="text" name="user_email" id="user_email" placeholder="userid or email" />
                    
                                <span class="glyphicon glyphicon-user" id="spa"><i id="uname_error"></i></span><br><br>

                                    <input type="submit" class="btn btn-success" name="forgot" value="Recover" /> &nbsp;

                                    <input type="button" class="btn btn-danger" name="cancel" value="Cancel" onclick="location.href='index.php';" /><br><br>
                </form>
        
        </div><!--/.div-->

    </div><!--/.row-->

</div><!--/.container-->


<script src="js/jquery-1.9.1.js" ></script>
<script src="js/jquery-1.12.0.min.js" ></script> 
<script src="js/bootstrap.min.js" ></script>
<script src="js/bootstrap.js" ></script>

<script type="text/javascript" >

//validation formating variables
$(document).ready(function() 
{
    $("#form").submit(function(e) 
    {
        if($("#user_email").val()=="")  
        {  
            alert('email required to recover password');  
            $("#user_email").focus();
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