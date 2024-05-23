<?php

session_start();

$servername = "localhost"; // kopplar till din lokala databas som körs i xampp
$username = "root";
$password = "";
$db = "php"; //använd namnet på din databas

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "SELECT * FROM upload";
$result = $conn->query($sql);


// $_SESSION["username"] = $_POST["username"];
// $_SESSION["password"] = $_POST["password"];

$login_success = false;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (
            $row["username"] == $_SESSION["username"]
        ) {
            $login_success = true;
        }
    }
} else {
    echo "0 results";
}
$conn->close();

if ($login_success) {


    echo "Välkommen till filuppladdning!" . "<br>";
} else {
    echo "Inloggning misslyckades    ";
    echo $_SESSION["username"];
}




echo "Ladda upp en fil!";

?>




<form action="database.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" />
    <input type="submit" value="Upload Image" name="sumbit" />
</form>
<?php
?>
<form action="index.html">
    <input type="submit" value="Log out" />
</form>
<?php









?>
<?php
?>

<?php

?>