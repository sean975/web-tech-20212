<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Query table</title>

  <style>
  table,
  td {
    border: 1px solid;
  }

  h3 {
    color: blue;
  }
  </style>
</head>

<body><?php $search=$_POST['search'];
  $sql="SELECT * FROM Products where(Product_desc=$search)";
  echo "<h3>Products Data</h3>";
  echo "The query is $sql";
  echo "<table>
<th><td>Num</td><td>Product</td><td>Cost</td><td>Weight</td><td>Count</td></th></table>";
$server="localhost";
  $username="root";
  $password="";
  $dbname="mydatabase";

  // Create connection
  $conn=new mysqli($server, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }


  $result=$conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while($row=$result->fetch_assoc()) {
      //  echo "<tr>
      //    <td> $row["ProductID"] </td>
      //    <td>$row["Product_desc"]</td>
      //    <td>$row["Cost"]</td>
      //    <td>$row["Weight"]</td>
      //    <td>$row["Numb"]</td>
      //  </tr>";
    }
  }

  else {
    echo "0 results";
  }

  $conn->close();
  ?></body>

</html>