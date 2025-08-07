<?php
$Name = $_POST['Name'] ?? '';
$Email = $_POST['Email'] ?? '';
$Mobile = $_POST['Mobile'] ?? '';
$Website = $_POST['Website'] ?? '';

// Correct host name is 'db' (from docker-compose service name)
$con = mysqli_connect('db', 'root', 'root', 'digital');

$sql = "INSERT INTO `userdata` (`Name`, `Email`, `Mobile`, `Website`) VALUES ('$Name', '$Email', '$Mobile', '$Website')";
$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "Contact Records Inserted";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
