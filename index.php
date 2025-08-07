<?php
    $con = mysqli_connect('localhost', 'root', '','digital');

    // get the post records
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Mobile = $_POST['Mobile'];
    $Website = $_POST['Website'];
    
    // database insert SQL code
    $sql = "INSERT INTO `userdata` (`Id`, `Fname`, `Femail`, `Fmobile`, `Fwebsite`) VALUES ('0', '$Name', '$Email', '$Mobile', '$Website')";
    
    // insert in database 
    $rs = mysqli_query($con, $sql);
    
    if($rs)
    {
        echo "Contact Records Inserted";
    }
    header('location:index.html');
?>