<?php include('../includers/header.php'); ?>
<?php include('../includers/session.php'); ?>
	<noscript>
    	<meta http-equiv="refresh" runat="server" id="mtaJSCheck" content="0;../error.php" />
    </noscript>
    <title>Admin_Panel</title>
    <style type="text/css">
        #drop
        {
            background-color: #222222;
            border: none;
            color: white;
            width: 160px;
            margin-top: 10px;
        }
    </style>
<!-- main container starts -->
<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand active" href="index.php">WebSiteName</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="manage_user.php">Manag Users</a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">    
                        <li>
                            <div class="dropdown" >
                                <button class="btn btn-success dropdown-toggle" id="drop" data-toggle="dropdown">Admin
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Setting</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../controllers/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
	</div>
	<div class="row"></div>
</div>
<!-- main container end -->
<?php include('../includers/footer.php'); ?>