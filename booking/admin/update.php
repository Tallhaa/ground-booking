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
        margin-top: 100px;


    }
    </style>
</head>
<?php
include 'config.php';
$ID = $_GET['id'];
$Record = mysqli_query($con,"SELECT * FROM `tblcard` WHERE id = $ID");
$data = mysqli_fetch_array($Record);

?>

<body>
    <!-- bootstrap form -->
    <div class="mainform">
        <form action="update1.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">NAME</label>
                <input name="name" type="text" value="<?php echo $data['Name'] ?>" class="form-control" id=""
                    placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input name="price" type="number" value="<?php echo $data['Price'] ?>" class="form-control" id=""
                    placeholder="Price">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="id"
                    rows="6"><?php echo $data['Description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Default file input example</label>
                <td><input name="image" class="form-control" type="file" value="<?php echo $data['image'] ?>" id=""><img
                        src="<?php echo $data['image'] ?>" width="500px auto" height="500px" alt="">
                </td>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id']?>">
            <div class="mb-3">
                <button type="submit" name="update" class="btn btn-primary btn-lg">Update</button>
            </div>
        </form>
    </div>

    <!-- update code -->





</body>

</html>