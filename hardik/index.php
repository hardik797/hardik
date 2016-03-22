<?php include('includers/header.php'); ?>
<?php include('includers/session.php'); ?>
<?php include('controllers/login_check.php'); ?>
<?php
//chcking whether querystring pass any error
if(isset($_GET['er']))
{
    //storing error into message
    $er = $_GET['er'];
}

if (isset($_SESSION['id']))
{
    if (isset($_SESSION['role']) == 1 && isset($_SESSION['id']) == 1) 
    {
        header('location:admin/index.php');
    }
    else
    {            
        header('location:user/manage_profile.php');
    }
}
?>
    <style type="text/css">
    #login
    {
        border: 5px solid green;
        margin-top: 150px;
        padding-top: 10px;
    }
</style>
<script src="js/jquery-1.12.2.js"></script>
<script type="text/javascript" >
//validation formating variables
var username = /^[a-z]|[0-9]/ ;
var numbers = /^[0-9]*$/ ;
var charspaceonly = /^[a-zA-Z ]*$/;
var charnumspace = /^[a-zA-Z\s]*$/;
var mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
$(document).ready(function() 
{
    $("form").submit(function() 
    {
        if($("#username").val()=="")  
        {  
            alert('Username must required');  
            $("#username").focus();
            return false;  
        }  
        else if($("#password").val()=="")  
        {  
            alert('Password must required');  
            $("#password").focus();
            return false;  
        }  
        else  
        {  
            return true;  
        }  
    });
});
</script>
    <title>Login</title>
    <noscript>
        <meta http-equiv="refresh" runat="server" id="mtaJSCheck" content="0;error.php" />
    </noscript>
    <!-- main container-->
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" id="login">
                <form role="form" name="form" method="post">
                    <label><span class="btn-danger"><?php echo $er; ?></span></label>
                    <div class="form-group">
                        <label for="email">Login Here</label>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-success" value="Submit">
                        <input type="button" value="Register" class="btn btn-info" 
                        onclick="location.href='user/user_register.php';">
                        <a class="text-danger" href="forgot_password.php">Forgot Password</a>
                    </div>
                </form>     
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <!-- container end here -->
<?php include('includers/footer.php'); ?>