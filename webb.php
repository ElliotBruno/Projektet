<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guestbook</title>
</head>
<h1></h1>

<body>

    <?php
    $name = "obama";
    $email = "elliot.bruno@gmail.com";
    $password = "dr";

    if ($_POST["name"] == $name and $_POST["Password"] == $password and $_POST["email"] == $email) {
        echo "Welcome $name";
    } else {
        echo "Sämst du är";
    }

    // $servername = "localhost"; // kopplar till din lokala databas som körs i xampp
    // $username = "root";
    // $password = "";
    // $db = "inlämning4"; //använd namnet på din databas



    //     if ($_POST["username"] == $name and $_POST["password"] == $password) {
    //         echo "Welcome $name";
    //     } else {
    //         echo "Sämst";
    //     }
    //     // Create connection
    //     $conn = mysqli_connect($servername, $username, $password, $db);
    //     $sql = "SELECT * FROM guestbook ORDER BY time desc";
    //     $result = $conn->query($sql);

    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             echo ("<hr>
    //             Posts: <br>
    //             <br>
    //             " . $row["time"] . "<br>
    //             From: " . $row["name"] . "<br>
    //             Email: " . $row["email"] . "<br>
    //             <a href='" . $row["homepage"] . "'>Homepage</a>
    //             <br>
    //             Comment: " . $row["comment"] . "<br>

    //             <div style='width: 100%'>
    //     <iframe width='50%' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?width=100%%26amp;height=600&amp;hl=en&amp;q=" . $row["address"] . "+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed'>
    //         <a href='https://www.gps.ie/sport-gps/'>hiking gps</a>
    //     </iframe>
    // </div>


    //             "

    //             );
    //         }
    //     } else {
    //         echo "0 results";
    //     }

    //     $conn->close();






    ?>

</body>



</html>