<?php
$Name = $_POST['Name'] ?? '';
$Email = $_POST['Email'] ?? '';
$Mobile = $_POST['Mobile'] ?? '';
$Website = $_POST['Website'] ?? '';

$conn = mysqli_connect("localhost", "root", "", "digital");

$sql = "INSERT INTO `userdata` (`Name`, `Email`, `Mobile`, `Website`) VALUES ('$Name','$Email','$Mobile','$Website')";

mysqli_query($conn, $sql);
?>
