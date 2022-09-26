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
</head>

<body>
    <?php include('admin/config.php');
    $id = $_GET['id'];
    $run = mysqli_query($con,"SELECT * FROM `tblcard` WHERE id = $id");
    $post = mysqli_fetch_array($run);
    ?>
    <div class="container py-5">
        <div class="row mt-4">
            <div class="col mb-4">
                <div class="card shadow w-75 mx-auto">
                    <div class="card-body">
                        <img src="admin/<?php echo $post['image']?>" class="card-img-top img-rounded"
                            alt="ground images">
                        <h3 class="card-title mt-3 mb-3"><?php echo ucfirst($post['Name']);?></h3>
                        <p class="card-text text-muted mb-3">
                            <?php echo $post['Description'];?>
                        </p>
                        <h6 class="text-muted mb-4"><?php echo $post['Price'];?></h6>
                        <a href="bookform.php?id=<?php echo $post['id']?>"
                            class="btn btn-lg btn-block btn-outline-primary shadow-none">Book Now
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>