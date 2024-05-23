<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guestbook</title>
</head>

<body>

    <?php



    $servername = "localhost"; // kopplar till din lokala databas som körs i xampp
    $username = "root";
    $password = "";
    $db = "php";


    $conn = mysqli_connect($servername, $username, $password, $db);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $homepage = $_POST["homepage"];
    $comment = $_POST["comment"];
    $sql = "INSERT INTO guuestbook (name, email, homepage, comment, time) VALUES ('$name', '$email', '$homepage', '$comment', now())";
    $result = $conn->query($sql);

    $sql2 = "select * from guuestbook ";
    $result2 =  $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            echo ("<hr>
        Posts: <br>
        
        <br>

" . "Time:" . $row["time"] . "<br>From: " . $row["name"] .
                "<br>Email: " . $row["email"]  . "<br>
        <a href='" . $row["homepage"] . "'>Homepage</a>
        <br>

     <br>   Comment: " . $row["comment"] . "<br>");
        }
    }


    // Create connection







    $conn->close();







    ?>

</body>
<form action="guestbook.html">
    <input type="submit" value="Guestbook" />
</form>



</html>