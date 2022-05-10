<html>

<head>
  <title>Insert table</title>
</head>

<body>
  <?php
    $itemDes = $_POST['itemDes'];
    $weight = $_POST['weight'];
    $cost = $_POST['cost'];
    $numb = $_POST['number'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Products (Product_desc, Cost, Weight, Numb)
    VALUES ($itemDes, $cost, $weight, $numb)";
    if ($conn->query($sql) === TRUE) {
      echo "The query is $sql<br>";
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  ?>
</body>

</html>
