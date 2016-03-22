<?php
//include required files
include('./configs/database.php');

//checking whether page if posted or not?
if (isset($_POST['login']))
{
    //fetching posted data and storing it to variable
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        $uname = trim($_POST['username']);  
        //generating md5 hash for original passwords            
        $salt = "!@#$%^&*()_+1234567890";
        $pass = md5(sha1($_POST['password']).$salt);
    }
    else
    {
        $er = 'uername & password are required field';
    }

    $sql = "SELECT id, username, email, user_role FROM tbl_users where username=? or email=? and password=?";
    $param = array($uname, $uname, $pass);
    $rows = fetch_rows($sql, $param);

    //check whether any row available with the given id and password                                    
    $result = count($rows);  
    
    //check for num or rows
    if ($result != 1) 
    {            
        header('location:./index.php?er=username or password is invalid');           
    }
    else   
    {
        //generating session
        $_SESSION['id'] = $rows[0]['id'];
        $_SESSION['user'] = $rows[0]['username'];
        $_SESSION['mail'] = $rows[0]['email'];
        $_SESSION['role'] = $rows[0]['user_role'];
    }//num rows else end here   

//main if end here
}
?>