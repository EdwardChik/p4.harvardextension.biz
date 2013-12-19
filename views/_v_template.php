<!DOCTYPE html>
<html>
<head>
    <!-- populates title if set in object -->
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>

    <!-- Twitter Bootstrap framework (minified) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">    
	
</head>

<body>  
    <!-- left margin of page -->
    <div class="col-sm-3 col-md-3"></div>

    <!-- middle content of page -->
    <div class="col-sm-6 col-md-6">

        <div id='menu'>
            <div>
                <header>
                    <!-- navigation bar -->
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- main site navigation bar -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <!-- responsive / collapsible navigation bar -->
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>

                                <!-- additional slots to accomodate expanded menu for users who are logged in -->
                                <?php if($user): ?>

                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                <?php endif; ?>

                            </button>
                        </div>

                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">

                                <!-- menu for users who are logged in -->
                                <?php if($user): ?>
                                    <li><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                                    <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                    <li><a href="/users/profile"><span class="glyphicon glyphicon-cog"></span> Profile</a></li>
                                    <li><a href="/posts"><span class="glyphicon glyphicon-list"></span> Woofs</a></li>
                                    <li><a href="/posts/users"><span class="glyphicon glyphicon-user"></span> Users</a></li>

                                <!-- menu for users who are not logged in -->
                                <?php else: ?>
                                    <li><p class="navbar-text"><span class="glyphicon glyphicon-home"></span> <a href="/">Home</a></p></li>
                                    <li><p class="navbar-text"><span class="glyphicon glyphicon-check"></span> <a href="/users/signup">Sign up</a></p></li>
                                    <li><p class="navbar-text"><span class="glyphicon glyphicon-log-in"></span> <a href="/users/login">Log in</a></p></li>
                                <?php endif; ?>     
                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
        </div>

        <!-- display element for standard masthead -->
        <div class="jumbotron">
            <h1></h1>

            <!--- Woof Woof Woof! logo -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="/images/logos/woofwoofwoof_logo.png" alt="Logo for Woof Woof Woof!" />
                </a>
                <div class="media-body">
                    <h2 class="media-heading"><?=APP_NAME?></h2>
                    Welcome to this super awesome messaging app!
                </div>
            </div>
        </div>

        <?php if(isset($content)) echo $content; ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <!-- page footer -->
                <footer>
                    <!-- details for site -->
                    <p><?=APP_NAME?> is project #2 for <a href="http://www.dwa15.com" target="_blank">CSCI E-15</a> as part of the <a href="http://www.extension.harvard.edu" target="_blank">Harvard Extension School</a>. The logo was obtained for non-commercial use from <a href="http://jamiesale-cartoonist.com/blog-of-cartoons/free-cartoon-dog-vector-clip-art/" target="_blank">this page</a>.</p>

                    <!-- copyright for site -->
                    <p>This web page is the copyright of Edward Chik, Fall 2013.</p>
                </footer>
            </div>
        </div>

    </div>

    <!-- right margin of page -->
    <div class="col-sm-3 col-md-3"></div>

    <!-- jQuery leveraged by Bootstrap for selected display elements -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <!-- enabling tooltips, an opt-in feature of Bootstrap -->
    <script type="text/javascript">
        $('.show_tooltip').tooltip();
    </script>
</body>
</html>