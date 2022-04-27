<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="site.php" method="get" >
    Your name: <input type="text" name="name" >
    <br>
    Date: <input type="date" name="date" >
    <br>
    Time: <input type="time" name="time" >
    <br>
    <input type="submit">
    <input type="reset" value="Reset">
  </form>
  <?php
    $name = $_GET["name"];
    $time = $_GET['time'];
    $date = $_GET['date'];
    echo "Hi $name!<br>";
    echo "You have choose to have an appointment on $time, $date<br>";
    echo '<br>';
    echo "More information<br>";
    echo '<br>';
    echo "In 12 hours, the time and date is $time, $date <br>";
    echo "This month has 30 days!";
  ?>
</body>
</html>
