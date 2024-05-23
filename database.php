<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php



    $servername = "localhost"; // kopplar till din lokala databas som körs i xampp
    $username = "root";
    $password = "";
    $db = "php"; //använd namnet på din databas

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);



    $filename = $_FILES['fileToUpload']['name'];


    $sql = "SELECT * FROM upload";

    $result = $conn->query($sql);


    $login_success = false;
    $full_name = "";
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
    if ($login_success) {
        echo "Connected successfully" . "<br>";

        // $_SESSION["username"] = $_POST["username"];
        $file = $_FILES["fileToUpload"]["name"];



        $myfile = fopen("file.txt", "a") or die("De fuckar");
        fwrite($myfile, $_SESSION["username"] . ";" . $file . "\n");
        fclose($myfile);
        echo 'Användaren' . "\n"  . $_SESSION["username"] . "\n" . "laddade upp filen" . "<br>" . $_FILES["fileToUpload"]["name"];
        $sql = "INSERT INTO upload (filename, username, uploadtime) VALUES ('$filename', '" . $_SESSION["username"] . "', NOW())";
        if ($_SESSION["username"] == "holros") {
            $sql = "insert into upload (username, filename, uploadtime, snuskig) VALUES ('" . $_SESSION["username"] . "','$filename', NOW(), TRUE);";
            echo ("HEEEEEJ");
        }

        $conn->query($sql);
    } else {
        echo "Inloggning misslyckades";
    }


    $target_dir = "upload/";
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
    $sql = "insert into upload (username, filename, uploadtime) VALUES ('" . $_SESSION["username"] . "','$filename', NOW();";



    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    ?>
    <form action="guestbook.html">
        <input type="submit" value="Guestbook" />
    </form>
    <form action="index.html">
        <input type="submit" value="Log out" />
    </form>





</body>

</html>