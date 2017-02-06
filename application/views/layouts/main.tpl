<?php

use frm\core\Auth;

?><!DOCTYPE html>
<html lang="en-US">
    <head>    
        <meta charset="utf-8">
        <title><?php echo(isset($title) ? $title : ''); ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>   

        <script src="/js/scripts.js"></script>    

        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>

        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <div class="header">
                    <ul class="nav nav-pills pull-right restricted-area">
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact" id="contact">Contact</a></li>               
                        <li class="restricted-area"><button type="button" class="btn btn-default btn-sm">
                                <a href="/admin"><span class="glyphicon glyphicon-edit"></span> Admin zone</a>
                            </button>
                        </li>   

                        <?php if (Auth::isAuth()) { ?>
                        <li class="restricted-area">
                            <button type="button" class="btn btn-default btn-sm">
                                <a href="/login/logout/" id="logout"><span class="glyphicon glyphicon-log-in"></span> 
                                    Logout [<?php echo Auth::getUser(); ?>]
                                </a>
                            </button>
                        </li>
                        <?php } else { ?>
                        <li class="restricted-area">
                            <button type="button" class="btn btn-default btn-sm">
                                <a href="/login/" id="login"><span class="glyphicon glyphicon-log-out"></span> Login</a>
                            </button>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-book"></span> Simple Framework</a>
                    </div>
                </div>          

            </div>
        </div>

        <!-- Begin page content -->
        <div class="container">
<?php echo $content; ?>    
        </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy; <?php echo date('Y'); ?></p>
      </div>
    </div>

</body>
</html>
