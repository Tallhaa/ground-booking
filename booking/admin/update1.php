<?php
include 'config.php';
if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME = mysqli_real_escape_string($con,$_POST['name']);
    $PRICE = mysqli_real_escape_string($con,$_POST['price']);
    $DESCRIPTION = mysqli_real_escape_string($con,$_POST['description']);
    $IMAGE = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    

    if($img_name!="")
    {
        move_uploaded_file($img_loc,'uploadimage/'.$img_name);
        mysqli_query($con,"UPDATE `tblcard` SET `Name`='$NAME',`Price`='$PRICE',`Description`='$DESCRIPTION',`image`='$img_des' WHERE id='$ID' ");
        header('location: index.php');
    }
    else
    {
        mysqli_query($con,"UPDATE `tblcard` SET `Name`='$NAME',`Price`='$PRICE',`Description`='$DESCRIPTION' WHERE id='$ID' ");
        header('location: index.php');
    }


    

}

?>