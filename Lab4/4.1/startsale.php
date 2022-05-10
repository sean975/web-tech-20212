<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Management</title>
  <style lang="">
    h3 {
      color: blue;
    }
  table,
  td, th {
    border: 1px solid;
  }
  </style>
</head>
<body>
  <h3>Select Product We Just Sold:<br></h3>
  <form action="sale.php" method='post'>
    Hammer <input type="radio" name="prod" checked value='Hammer'>

    Screwdriver <input type="radio" name="prod" value='Screwdriver'>
    Wrench <input type="radio" name="prod" value='Wrench'>
    <br>
    <input type="submit" value="Click to Submit">
    <input type="reset" value="Reset">
  </form>
<br>
  <?php
  echo "The query is SELECT * from Products";
$server = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>";
    echo "<tr>";
      echo "<th>Product_ID</th>";
      echo "<th>Product_desc</th>";
      echo "<th>Cost</th>";
      echo "<th>Weight</th>";
      echo "<th>Number</th>";
    echo "</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
        echo "<td>" . $row["ProductID"] . "</td>";
        echo "<td>" . $row["Product_desc"] . "</td>";
        echo "<td>" . $row["Cost"] . "</td>";
        echo "<td> " . $row["Weight"] . "</td>";
        echo "<td>" . $row["Numb"] . "</td>";
      echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>
