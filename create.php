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

    <title>JukeBox Application</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/screen.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/list.css" rel="stylesheet">

</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="inner cover">
                <h1 class="cover-heading">Create a Playlist</h1>
                <div class="form-container">
                    <form class="form-signin" id="createplaylistform" method="get" action="controlpanel.php">
                        <span class="inputlabel">Playlist name</span>
                        <input type="text" id="inputList" class="form-control" placeholder="AwesomeListName" name="playlistname"required autofocus>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="create">Create Playlist</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
