<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Ground Booking</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>


    <!-- fetch data -->

    <h1 class="text-center my-5">Manage Grounds</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Booking Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Number of Days</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Payment</th>



                    <th scope="col">Action</th>





                </tr>
            </thead>
            <tbody>
                <?php
                    include 'config.php';
                    $pic = mysqli_query($con,"SELECT * FROM `booking` ORDER BY id DESC");
                    $count=0;
                    while($row = mysqli_fetch_array($pic))
                        {
                    ?>
                <tr>
                    <td><?php echo ++$count?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Price'];?>Rs</td>
                    <td><?php echo $row['book_date'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['booking_name'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['date_from'];?></td>
                    <td><?php echo $row['date_to'];?></td>
                    <td><?php echo $row['days'];?></td>
                    <td><?php echo $row['total'];?>Rs</td>
                    <td><?php echo $row['cod'];?></td>


                    <td><a href="update_ground.php?id=<?php echo $row['id'] ?>" class='btn btn-success'>Update
                            Booking</a></td>
                </tr>
                <?php
                        }

                ?>
            </tbody>
        </table>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>