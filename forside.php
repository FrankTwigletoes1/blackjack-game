
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 1000px;
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            width: 210px;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }
    </style>
</head>
<body>
    <?php
    require('navbar.php')
    ?>
    <!--sidebar-->
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">

                <ul class="nav nav-pills nav-stacked" style="margin-top: 20%;">
                    <img src="vertban.png" style="margin-bottom: 90%;">
                    <div class="card" style="outline:solid; padding: 10px; padding-bottom: 70px; background-color: antiquewhite;">
                        <img src="hval.png" width="100%" height="200px">

                        

                    </div>
                </ul><br>
            </div>
            <br>
            <div class="col-sm-9">
                <div class="well">
                    <h4>Nyeste vindere!  De nyeste vinder staar her, De nyeste vinder staar her, De nyeste vinder staar her, De nyeste vinder staar her</h4>
                    
                </div>
                <div>
                <img src="fakeforside.png" width="1400px">
                </div>
               
            </div>
        </div>
    </div>

</body>
</html>