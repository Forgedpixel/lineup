<?php
/**
 * Created by PhpStorm.
 * User: ForgedPixel
 * Date: 5-2-2016
 * Time: 15:22
 */
?>

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
                <div class="controlpanel">
                    <h2 class="playlistTitle"><?php echo $_GET['playlistname'] ?></h2>
                    <div class="column video left">
                        <div class="player-wrapper">
                            <div id="player"></div>
                        </div>
                        <div class="information">
                            <h2>FeestDJRuud - Gas Op Die Lollie</h2>
                            <p>Added by Admin</p>
                        </div>
                    </div>
                    <div class="column list right">
                        <ul></ul>
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
<script src="js/player.js"></script>
</body>
</html>

