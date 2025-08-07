<?php
$Name = $_POST['Name'] ?? '';
$Email = $_POST['Email'] ?? '';
$Mobile = $_POST['Mobile'] ?? '';
$Website = $_POST['Website'] ?? '';

// 🛠️ Replace 'localhost' with 'db'
$conn = mysqli_connect("db", "root", "root", "digital");

$sql = "INSERT INTO `userdata` (`Name`, `Email`, `Mobile`, `Website`) VALUES ('$Name','$Email','$Mobile','$Website')";

if ($conn && mysqli_query($conn, $sql)) {
    echo "Contact Records Inserted";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
