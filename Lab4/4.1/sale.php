<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Update Results</title>
  <style>
    h3 {
      color: blue;
    }
    table, td {
      border: 1px solid;
    }
  </style>
</head>
<body>
  <h3>Update Results for Table Products</h3>
  <?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
$prod = $_POST['prod'];

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// update table
$updateSql = "UPDATE Products SET Numb=Numb-1 WHERE (Product_desc=$prod)";
echo "<p>The query is $updateSql</p>";

$conn->query($updateSql);

$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

// query table

  echo "<table>
    <th>
      <td>Num</td>
      <td>Product</td>
      <td>Cost</td>
      <td>Weight</td>
      <td>Count</td>
    </th>
  </table>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //  echo "<tr>
    //    <td> $row["ProductID"] </td>
    //    <td>$row["Product_desc"]</td>
    //    <td>$row["Cost"]</td>
    //    <td>$row["Weight"]</td>
    //    <td>$row["Numb"]</td>
    //  </tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
  ?>
</body>
</html>
