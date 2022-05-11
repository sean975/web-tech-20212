<!DOCTYPE html>
<html>
<head>
  <title>Query table</title>
  <style>
  table,
  td, th {
    border: 1px solid;
    border-collapse: collapse;
  }
  </style>
</head>
<body>
<?php
$username = "root";
$password = "";
$server = "localhost";
$dbname = "business_service";

$connect = new mysqli($server, $username, $password, $dbname);

if($connect->connect_error){
    die("Khong ket noi :" .  $conn->connect_error);
    exit();
}

$catID = "";
$title = "";
$description = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["title"])) { $title = $_POST['title']; }
    if(isset($_POST["description"])) { $description = $_POST['description']; }
    if(isset($_POST["catID"])) { $catID = $_POST['catID']; }

    $sql = "INSERT INTO categories (CategoryID, Title, Description) VALUES ('$catID', '$title', '$description')";
    $sqlselect = "SELECT * FROM categories";

    if($connect->query($sql) == TRUE) {
        $result = $connect->query($sqlselect);

        if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
            echo "<td> CatID </td>";
            echo "<td> Title </td>";
            echo "<td>Description</td>";
        echo "</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
        
            echo "<tr>";
                echo "<td>" . $row["CategoryID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        } else {
        echo "0 results";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

$connect->close();
?>

<form action="admin.php" method="post">
    <table>
        
        <tr>
            <td><input type="text" name="catID"></td>
            <td><input type="text" name="title"></td>
            <td><input type="text" name="description"></td>
        </tr> 
    </table>
    <input type="submit" value="Add Category">
</form>
</body>
</html>