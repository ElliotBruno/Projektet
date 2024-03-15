<?php
$conn = mysqli_connect($servername, $username, $password, $db);

$filename = $_FILES['fileToUpload']['name'];


echo 'Användaren,' . $_SESSION["username"] . "\n" . "laddade upp filen" . "<br>" . $_FILES["fileToUpload"]["name"];




if ($_SESSION["username"] == "Obama" and $_SESSION["password"] == "dr") {
    $file = $_FILES["fileToUpload"]["name"];



    $myfile = fopen("file.txt", "a") or die("De fuckar");
    fwrite($myfile, $_SESSION["username"] . ";" . $file . "\n");
    fclose($myfile);
} else {
    echo "Du har inte rätt inglogninsuppgifter";
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        echo "laddade upp filen nedladdning ";
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
$sql = "insert into uploads (user, filename, uploadtime, snuskig) VALUES ('" . $_SESSION["username"] . "','$filename', NOW(), FALSE);";

$result = $conn->query($sql);
if ($_SESSION["username"] == "holros") {
    $sql = "insert into uploads (user, filename, uploadtime, snuskig) VALUES ('" . $_SESSION["username"] . "','$filename', NOW(), TRUE);";

    $conn->query($sql);
}
// }
