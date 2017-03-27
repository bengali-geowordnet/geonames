<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Bengali GeoWordNet</title>

        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="../assets/css/registration.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="https://farhanarrafi.com">Bengali GeoWordNet</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="span12">
                <form class="form-registration" action='registration' method="POST">

                    <h2 class="form-registration-heading">Please register</h2>

                    <div>
                        <!-- Username -->
                        <label class="control-label" for="username"><h4>Username</h4></label>
                        <div class="controls">
                            <input class="input-xlarge form-control" type="text" id="username" name="username" placeholder="enter username" value="<?php echo set_value('username'); ?>" >
                            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                        </div>
                    </div>
                    <?php if (form_error('username') != NULL) { ?>      
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> <?php echo form_error('username'); ?> 
                        </div>
                    <?php } ?>



                    <div>
                        <!-- E-mail -->
                        <label class="control-label" for="email"><h4>E-mail</h4></label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="enter email address" value="<?php echo set_value('email'); ?>" class="input-xlarge form-control">
                            <p class="help-block">Please provide your E-mail</p>
                        </div>
                    </div>

                    <?php if (form_error('email') != NULL) { ?>      
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> <?php echo form_error('email'); ?> 
                        </div>
                    <?php } ?>



                    <div>
                        <!-- Password-->
                        <label class="control-label" for="password"><h4>Password</h4></label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge form-control">
                            <p class="help-block">Password should be at least 8 characters</p>
                        </div>
                    </div>
                    <?php if (form_error('password') != NULL) { ?>      
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> <?php echo form_error('password'); ?> 
                        </div>
                    <?php } ?>     




                    <div>
                        <!-- Password -->
                        <label class="control-label"  for="password_confirm"><h4>Password (Confirm)</h4></label>
                        <div class="controls">
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge form-control">
                            <p class="help-block">Please confirm password</p>
                        </div>
                    </div>
                    <?php if (form_error('password_confirm') != NULL) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong><?php echo form_error('password_confirm'); ?> 
                        </div> 
                    <?php } ?> 
                    <button class="btn btn-lg btn-primary btn-block">Register</button>

                </form>

            </div>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
