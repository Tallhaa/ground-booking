<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
    .mainform {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    </style>
</head>

<body>
    <!-- <center>
        <div class="main">
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <label for="">Name</label>
                <input type="text" name="name"><br>
                <label for="">Price</label>
                <input type="text" name="price" id=""><br>
                <label for="">Description</label>
                <input type="text" name="description" id=""><br>
                <label for="">Image</label>
                <input type="file" name="image" id=""><br>
                <button name="upload">Upload</button>
            </form>
        </div>
    </center> -->
    <!-- bootstrap form -->
    <div class="mainform">
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">NAME</label>
                <input name="name" type="text" class="form-control" id="" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input name="price" type="number" class="form-control" id="" placeholder="Price" required>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Default file input example</label>
                <input name="image" class="form-control" type="file" id="">
            </div>
            <div class="mb-3">
                <button name="upload" class="btn btn-primary btn-lg">Upload</button>
            </div>
        </form>
    </div>

    <!-- fetch data -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>


                </tr>
            </thead>
            <tbody>
                <?php
                    include 'config.php';
                    $pic = mysqli_query($con,"SELECT * FROM `tblcard`");
                    $count=0;
                    while($row = mysqli_fetch_array($pic))
                        {
                    ?>
                <tr>
                    <td><?php echo ++$count?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Price'];?></td>
                    <td><?php echo substr($row['Description'],0,30);?></td>
                    <td><img src=<?php echo $row['image']?> width='200px' height='70px'></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class='btn btn-danger'>Delete</a></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class='btn btn-danger'>Update</a></td>
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