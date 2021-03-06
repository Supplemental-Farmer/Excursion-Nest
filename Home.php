<?php
$conn = mysqli_connect("localhost", "root", "", "excursionnest");

$query = "UPDATE upcoming SET FLAG=1 WHERE StartD <= CURDATE()";
mysqli_query($conn, $query);
$query1 = "UPDATE booked SET FLAG=1 WHERE EndIng < CURDATE()";
mysqli_query($conn, $query1);
$query2 = "UPDATE booked SET CANCEL=1 WHERE StartD <= CURDATE()";
mysqli_query($conn, $query2);

?>
<!DOCTYPE html>
<html>

<head>
    <title>ExcursionNest</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        body {
            height: 100%;
            background: url("Pictures/back1.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            animation: slider 40s infinite linear;

        }

        @keyframes slider {
            0% {
                background-image: url("Pictures/back2.jpg");

            }

            20% {

                background-image: url("Pictures/back.jpg");
            }

            40% {

                background-image: url("Pictures/back3.jpg");
            }

            60% {

                background-image: url("Pictures/back1.jpg");
            }

            80% {

                background-image: url("Pictures/back5.jpg");
            }

        }

        .card:hover {
            box-shadow: 6px 8px 6px rgba(255, 162, 208, 0.959), 6px 8px 6px khaki;
        }

        .card {
            background-image: linear-gradient(hotpink, khaki);
            box-shadow: 6px 8px 6px black;
            font-size: 8px;
            border-radius: 5%;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container">
            <a class="navbar-brand" href="Home.php">
                <img src="Pictures/hosse.png">
            </a>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="Home.php"><i class="fa fa-home"></i> Home</a></li>

                    <li><a href="gallery.html"><i class="fa fa-image"></i> Gallery</a></li>
                    <li><a href="recents.php"><i class="fa fa-list-ul"></i> Recents</a></li>

                    <li><a href="aboutus.html"><i class="fa fa-users"></i> About Us</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="User_Login.php"><i class="fa fa-user"></i> Login</a></li>
                    <li><a href="signup.html"><i class="fa fa-user-plus"></i> SignUp</a></li>
                    <li><a href="admin.php"><i class="fa fa-lock"></i> Admin</a></li>
                </ul>
            </div>
        </div>

    </nav>
    <div class="container" style="margin-top: 170px;">
        <form action="" method="GET">

            <div class="input-group mb-3">
                <input type="text" class="form-control" value="<?php if (isset($_GET['search'])) {
                                                                    echo $_GET['search'];
                                                                } ?>" name="search" id="search" placeholder="Search for Your Destination eg. Cox's Bazar, St. Martin.......">
                <div class="input-group-btn">

                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-search"></i></button>

                </div>

            </div>

        </form>
    </div>
    <div class="row mx-3 my-5">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



            <?php
            $conn = mysqli_connect("localhost", "root", "", "excursionnest");
            if (isset($_GET['search'])) {
                $filter = $_GET['search'];
                $query = "SELECT * FROM upcoming WHERE togo LIKE '%$filter%' AND FLAG=0";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $items) {
            ?>

                        <div class="col-md-3">
                            <div class="box-container">
                                <div class="card" style="margin-bottom: 15px;">
                                    <img src="<?php echo $items['Pic'] ?>" height="200px" alt="" style="border-radius: 5%;">
                                    <div align="center">
                                        <h4 style="margin-top: 10px;"><i class="	fa fa-map-marker" style="color:green"></i> <?php echo $items['togo'] ?></h4>
                                        <h5 style="margin: 0px;">Start From: <?php echo $items['StartP'] ?> </h5><br>
                                        <div class="price">
                                            <h5 style="margin-top: 0px;"><?php echo $items['COST'] ?> BDT Per Person</h5>
                                        </div>
                                        <div class="stars" style="margin-top: 0px;margin-bottom:10px;">
                                            <i class="fa fa-star" style="color:crimson"></i>
                                            <i class="fa fa-star" style="color:crimson"></i>
                                            <i class="fa fa-star" style="color:crimson"></i>
                                            <i class="fa fa-star" style="color:crimson"></i>
                                            <i class="fa fa-star" style="color:crimson"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>



        </div>


    <?php
                } else {
    ?>
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

            <table class="table table-bordered" align="center" style="margin-top: 40px;">
                <tr bgcolor='wheat' align="center">
                    <td colspan="7"> <b>No Upcoming Trips Found!!!!!!!!</b>
                    </td>
                </tr>
            </table>
    <?php
                }
            }
    ?>


        </div>
    </div>
    </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>