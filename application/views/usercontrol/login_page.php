<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Bengali GeoWordNet</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/signin.css" rel="stylesheet">

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
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="span12">
                <form class="form-signin" action="login" method="POST">
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <div>
                        <!-- Username -->
                        <label class="control-label" for="username"><h4>Username</h4></label>
                        <div class="controls">
                            <input class="input-xlarge form-control" autofocus="" type="text" id="username" name="username" placeholder="" value="<?php echo set_value('username'); ?>">
                        </div>
                    </div>
                    <?php if (form_error('username') != NULL) { ?>      
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> <?php echo form_error('username'); ?> 
                        </div>
                    <?php } ?>

                    <div >
                        <!-- Password-->
                        <label class="control-label" for="password"><h4>Password</h4></label>
                        <div class="controls">
                            <input class="form-control input-xlarge" type="password" id="password" name="password" placeholder="">
                        </div>
                    </div>
                    <?php if (form_error('password') != NULL) { ?>      
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> <?php echo form_error('password'); ?> 
                        </div>
                    <?php } ?>
                    <div class="checkbox">
                        <label>
                            <input value="remember-me" type="checkbox"> Remember me
                        </label>
                    </div>
                    <div>
                        <a href="resetpassword.html">Forgot Password</a>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
            </div>
        </div>




        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../assets/js/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>



