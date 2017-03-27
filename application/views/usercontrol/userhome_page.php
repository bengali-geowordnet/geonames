<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>User Dashboard</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/dashboard.css" rel="stylesheet">

        <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://farhanarrafi.com">Bengali GeoWordNet</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active" ><a href="#home" data-toggle="tab" aria-controls="home" role="tab">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#profile" data-toggle="tab" aria-controls="profile" role="tab">Edit Profile</a></li>
                        <li><a href="#token" data-toggle="tab" aria-controls="token" role="tab">Manage Token</a></li>
                        <li><a href="#input" data-toggle="tab" aria-controls="input" role="tab">Input Data</a></li>
                        <li><a href="#inserts" data-toggle="tab" aria-controls="inserts" role="tab">View Inserts</a></li>
                        <li><a href="#settings" data-toggle="tab" aria-controls="settings" role="tab">Settings</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active fade in" id="home">
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <h1 class="page-header">User Home</h1>

                            <div class="row placeholders">
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <img src="../assets/image/default-user.png" class="img-responsive" alt="Generic placeholder thumbnail">
                                    <h4>Profile Pic</h4>
                                    <span class="text-muted">User Device</span>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                </div>
                            </div>

                            <h2 class="sub-header">Home</h2>
                            <div class="table-responsive">
                                <div class="col-xs-12 col-sm-9">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Username</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['username']; ?>
                                        </div>
                                    </div>

                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">User Email</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['email']; ?>
                                        </div>
                                    </div>

                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">User Token</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['token']; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="profile">
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <h1 class="page-header">Edit Profile</h1>

                            <div class="row placeholders">
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <img src="../assets/image/default-user.png" class="img-responsive" alt="Generic placeholder thumbnail">
                                    <h4>Profile Pic</h4>
                                    <span class="text-muted">User Device</span>
                                </div>
                                <div class="col-xs-6 col-sm-9">
                                </div>
                            </div>

                            <h2 class="sub-header">Profile</h2>
                            <div class="table-responsive">
                                <div class="col-xs-12 col-sm-9">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Username</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['username']; ?>
                                        </div>
                                    </div>

                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">User Email</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['email']; ?>
                                        </div>
                                    </div>

                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">User Token</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['token']; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="token">
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <h1 class="page-header">Manage Token</h1>

                            <div class="row placeholders">
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <img src="../assets/image/default-user.png" class="img-responsive" alt="Generic placeholder thumbnail">
                                    <h4>Profile Pic</h4>
                                    <span class="text-muted">User Device</span>
                                </div>
                                <div class="col-xs-6 col-sm-9">
                                </div>
                            </div>

                            <h2 class="sub-header">Tokens</h2>
                            <div class="table-responsive">
                                <div class="col-xs-12 col-sm-9">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Username</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['username']; ?>
                                        </div>
                                    </div>

                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">User Token</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['token']; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="input">
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <h1 class="page-header">Input Data</h1>

                            <h4>This input system is for testing purpose only.</h4>
                            <div class="col-sm-9 col-xs-12 container">
                                <form action="../../web/post" method="POST">
                                    <div class="form-group">
                                        <label for="geoname_username">Username</label>
                                        <input type="text" class="form-control" name="geoname_username" id="geoname_username" value="<?php echo $user['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="geoname_token">Token</label>
                                        <input type="text" class="form-control" name="geoname_token" id="geoname_token" value="<?php echo $user['token']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="geoname_name">Name</label>
                                        <input type="text" class="form-control" name="geoname_name" id="geoname_name" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="geoname_class">Feature Class</label>
                                        <select class="form-control" name="geoname_class" id="geoname_class">
                                            <option value="A">Administrative Boundary Features</option>
                                            <option value="H">Hydrographic Features</option>
                                            <option value="L">Area Features</option>
                                            
                                            <option value="P">Populated Place Features</option>
                                            <option value="R">Road / Railroad Features</option>
                                            <option value="S">Spot Features</option>
                                            
                                            <option value="T">Hypsographic Features</option>
                                            <option value="U">Undersea Features</option>
                                            <option value="V">Vegetation Features</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="geoname_subclass">Feature Sub-Class</label>
                                        <input type="text" class="form-control" name="geoname_subclass" id="geoname_subclass" placeholder="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="geoname_longitude">Feature Longitude</label>
                                        <input type="number" max="180.0" min="-180.0" class="form-control" name="geoname_longitude" id="geoname_longitude" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="geoname_latitude">Feature Latitude</label>
                                        <input type="number" max="90.0" min="-90.0" class="form-control" name="geoname_latitude" id="geoname_latitude" placeholder="">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="inserts">
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <h1 class="page-header">View Inserts</h1>

                            <h4>The data is shown sorted according to date, with latest data at the top.</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Place Name</th>
                                            <th>latitude</th>
                                            <th>longitude</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($data['raw'] !== null) {
                                            $i = 1;
                                            foreach ($data['raw'] as $row) {
                                                echo "<tr>";
                                                echo "<td>" . $i++ . "</td>";
                                                echo "<td>" . $row->name . "</td>";
                                                echo "<td>" . $row->longitude . "</td>";
                                                echo "<td>" . $row->latitude . "</td>";
                                                echo "<td>" . $row->time . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="settings">
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <h1 class="page-header">Manage Settings</h1>

                            <div class="row placeholders">
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <img src="../assets/image/default-user.png" class="img-responsive" alt="Generic placeholder thumbnail">
                                    <h4>Profile Pic</h4>
                                    <span class="text-muted">User Device</span>
                                </div>
                                <div class="col-xs-6 col-sm-9">
                                </div>
                            </div>

                            <h2 class="sub-header">User Details</h2>
                            <div class="table-responsive">
                                <div class="col-xs-12 col-sm-9">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Username</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $user['username']; ?>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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

