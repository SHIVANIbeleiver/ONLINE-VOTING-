<?php
    include("connect.php");
    $name = $_POST['name'];
    $mobile= $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['name']['image'];
    $tmp_name = $_FILES['tmp_name']['image'];
    $role = $_POST['role'];
    if($cpassword!=$password){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/register.html";
            </script>';
    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert = mysqli_query($connect," INSERT INTO user (name, mobile, password, address, photo, status, votes, role) VALUES('$name', '$mobile', '$password' , '$image', 0, 0, '$role') ");
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../routes/index.html";
                </script>';
        }
    }

?>