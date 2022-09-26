<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<?php
include 'config.php';
$ID = $_GET['id'];
$row = mysqli_query($con,"SELECT * FROM `booking` WHERE id = $ID");
$data = mysqli_fetch_array($row);

?>

<body>

    <h1 class="text-center">Update Booking</h1>

    <form action="" method="POST" class="form w-50 mx-auto mt-4">
        <div class="form-group">
            <tr>
                <td class="mb-1">Booking Name:</td>
                <td class="mb-3"><b><?php echo $data['Name']?></b></td>
            </tr>
        </div>

        <div class="form-group">
            <tr>
                <td>Price:</td>
                <td><b><?php echo $data['Price']?></b></td>
            </tr>
        </div>
        <div class="form-group">
            <label for="" class="mb-2">Status</label>
            <select name="status" id="">
                <option <?php if($data['status']=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                <option <?php if($data['status']=="Request Accepted"){echo "selected";} ?> value="Request Accept">
                    Request Accepted</option>
                <option <?php if($data['status']=="Request Canceled"){echo "selected";} ?> value="Request Canceled">
                    Request Canceled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="booking_name" class="mb-2">Name</label>
            <input type="text" name="booking_name" value="<?php echo $data['booking_name'] ?>"
                class="form-control mb-2">
        </div>


        <div class="form-group">
            <label for="address" class="mb-2">Address</label>
            <input type="text" name="address" value="<?php echo $data['address'] ?>" class="form-control mb-2">
        </div>
        <div class="form-group">
            <label for="contact" class="mb-2">Contact No.</label>
            <input type="number" name="contact" value="<?php echo $data['contact'] ?>" minlength="11" maxlength="11"
                class="form-control mb-2">
        </div>
        <div class="form-group">
            <label for="email" class="mb-2">Email</label>
            <input name="email" type="email" value="<?php echo $data['email'] ?>" class="form-control mb-2">
        </div>
        <div class="form-group py-3">

            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                <input type="hidden" name="price" value="<?php echo $data['Price'] ?>">
                <input type="submit" name="submit" value="udate booking" class="btn-secondary">
            </td>
        </div>

    </form>

    <?php

        if(isset($_POST['submit'])){
            $ID = $_POST['id'];
            $NAME = mysqli_real_escape_string($con,$_POST['Name']);
            $PRICE = mysqli_real_escape_string($con,$_POST['Price']);
            $BOOK_DATE = date("Y-m-d h:i:sa");
            $STATUS = $_POST['status']; //Booked Request Sent, Book Request Accepted, Book Request Canceled
            $BOOKING_NAME = mysqli_real_escape_string($con,$_POST['booking_name']);
            $ADDRESS = mysqli_real_escape_string($con,$_POST['address']);
            $CONTACT = mysqli_real_escape_string($con,$_POST['contact']);
            $EMAIL = mysqli_real_escape_string($con,$_POST['email']);
            // $DATE_FROM = $_POST['date_from'];
            // $DATE_TO = $_POST['date_to'];
            // $DAYS = (strtotime($DATE_TO) - strtotime($DATE_FROM)) / (60 * 60 * 24);
            // $TOTAL = (int)$PRICE * $DAYS;
            // $COD = mysqli_real_escape_string($con,$_POST['cod']);
            
            mysqli_query($con,"UPDATE `booking` SET `status`='$STATUS',`booking_name`='$BOOKING_NAME',`address`='$ADDRESS',`contact`='$CONTACT',`email`='$EMAIL' WHERE id = $ID");
            header("location: manage_ground.php");   
            }

?>


</body>

</html>