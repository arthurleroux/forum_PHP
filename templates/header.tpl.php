<!doctype html>
<html>
<head>
    <title>ForumByArthur</title>
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/style.css">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ForumByArthur |</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if (isset($_SESSION['pseudo'])){ ?>
                <ul class="nav navbar-nav">
                    <li><a href="new_topic.php">New topic</a></li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['is_admin'] == 1){ ?>
                <ul class="nav navbar-nav">
                    <li><a href="members_list.php">Members list</a></li>
                </ul>
            <?php } ?>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['pseudo'])){ ?>
                <li id="hi">Hello <?php echo $_SESSION['pseudo']; ?></li>
                <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




