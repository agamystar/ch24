<?php
use app\core\classes\Auth;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Task </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo url(); ?>">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        if (!Auth::user()) { ?>
                            <li><a class="dropdown-item" href="<?php echo url() . '/auth/login' ?>">Login</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo url() . '/auth/register' ?>">Register</a></li>
                        <?php }else{ ?>
                            <li><a class="dropdown-item" href="<?php echo url() . '/post/create' ?>">Create Post</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo url() . '/auth/logout' ?>">Logout</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php
                if (Auth::user()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                           href="#">Hello, <?php echo Auth::user()->name; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<div class="content p-5"> 
  