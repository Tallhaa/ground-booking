<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ground</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    .card {
        flex-direction: row;
    }
    </style>

</head>

<body>

    <?php include('admin/config.php');
    $id = $_GET['id'];
    $run = mysqli_query($con,"SELECT * FROM `tblcard` WHERE id = $id");
    $post = mysqli_fetch_array($run);
    $name = $post['Name'];
    $price = $post['Price'];
    $image = $post['image'];
    ?>
    <div class="container">
        <div class="row mt-4">
            <div class="card shadow w-50 mx-auto">
                <div class="card-body">
                    <button class="align-left my-3"><a href="view_booking.php">View Your Booking</a></button>
                    <form action="" method="POST" class="form">
                        <fieldset class="bg-light rounded px-2">
                            <legend class="bg-white">Selected Ground</legend>
                            <img src="admin/<?php echo $image; ?>" class="card-img-top img-rounded" alt="ground images"
                                style="float:left;width:70px;height:70px; margin-right: 20px;">
                            <h3 class="card-title mt-3 mb-3">Name: <?php echo ucfirst($name);?></h3>
                            <input type="hidden" name="Name" value="<?php echo $name; ?>">
                            <h6 class=" mb-4">Price: <?php echo $price;?></h6>
                            <input type="hidden" name="Price" value="<?php echo $price ?>">

                            <h6 class="mb-4">Id: <?php echo $post['id']?></h6>
                        </fieldset>
                        <hr>

                        <fieldset>
                            <legend class="bg-light px-2">Book Details</legend>
                            <div class="form-group">
                                <label for="booking_name" class="mb-2">Name</label>
                                <input type="text" name="booking_name" class="form-control mb-2" required>
                            </div>


                            <div class="form-group">
                                <label for="address" class="mb-2">Address</label>
                                <input type="text" name="address" class="form-control mb-2" required>
                            </div>
                            <div class="form-group">
                                <label for="contact" class="mb-2">Contact No.</label>
                                <input type="number" name="contact" minlength="11" maxlength="11"
                                    class="form-control mb-2" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="mb-2">Email</label>
                                <input name="email" type="email" class="form-control mb-2" required>
                            </div>
                            <div class="form-group">
                                <label for="date_from" class="control-label">From Date</label>
                                <input name="date_from" id="date_from" type="date" class="form-control mb-2" required />
                            </div>
                            <div class="form-group">
                                <label for="date_to" class="control-label">To Date</label>
                                <input name="date_to" id="date_to" type="date" class="form-control mb-2" required />
                            </div>
                            <div class="form-group">
                                <input name="cod" class="form-check-input" type="checkbox" value="Cash on Arrival"
                                    id="flexCheckDefault" checked required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Cash on Arrival
                                </label>
                            </div>
                            <div class="form-group py-3">

                                <button name="booking" class=" btn btn-outline-primary text-center form-control"
                                    type="submit">Confirm
                                    Booking</button>
                            </div>
                        </fieldset>

                    </form>

                </div>
            </div>

        </div>
    </div>


    <?php
        // include db connection
        include 'admin/config.php';


        if(isset($_POST['booking'])){
            $NAME = mysqli_real_escape_string($con,$_POST['Name']);
            $PRICE = mysqli_real_escape_string($con,$_POST['Price']);
            $BOOK_DATE = date("Y-m-d h:i:sa");
            $STATUS = "Ordered"; //Booked Request Sent, Book Request Accepted, Book Request Canceled
            $BOOKING_NAME = mysqli_real_escape_string($con,$_POST['booking_name']);
            $ADDRESS = mysqli_real_escape_string($con,$_POST['address']);
            $CONTACT = mysqli_real_escape_string($con,$_POST['contact']);
            $EMAIL = mysqli_real_escape_string($con,$_POST['email']);
            $DATE_FROM = $_POST['date_from'];
            $DATE_TO = $_POST['date_to'];
            $DAYS = (strtotime($DATE_TO) - strtotime($DATE_FROM)) / (60 * 60 * 24);
            $TOTAL = (int)$PRICE * $DAYS;
            $COD = mysqli_real_escape_string($con,$_POST['cod']);
            

            // inset data
            mysqli_query($con,"INSERT INTO `booking`(`Name`, `Price`, `book_date`, `status`, `booking_name`, `address`, `contact`, `email`, `date_from`, `date_to`, `days`, `total`, `cod`) VALUES ('$NAME','$PRICE','$BOOK_DATE','$STATUS','$BOOKING_NAME','$ADDRESS','$CONTACT','$EMAIL','$DATE_FROM','$DATE_TO','$DAYS','$TOTAL','$COD')");
            

        }

    ?>
</body>

</html>