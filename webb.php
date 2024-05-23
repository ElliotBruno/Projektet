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



    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }



    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);


    $login_success = false;
    $full_name = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (
                $row["username"] == $_POST["username"] &&
                $row["password"] == $_POST["password"]
            ) {
                $login_success = true;
                $full_name = $row["name"];
            }
        }
    } else {
        echo "0 results";
    }


    $conn->close();


    if ($login_success) {
        session_start();
        echo "Connected successfully" . "<br>";
        echo "Hej " . $full_name . "<br>";
        echo "<a href='file.php'>Ladda upp fil</a>";
        $_SESSION["username"] = $_POST["username"];
    } else {
        echo "Inloggning misslyckades";
    }

    ?>
    <form action="index.html">
        <input type="submit" value="Log out" />
    </form>
</body>

</html>