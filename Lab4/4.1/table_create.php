<html>
  <head>
    <title>Create table</title>
  </head>
  <body>
    <?php
       $server = "localhost";
       $user   = "root";
       $pass  = "";
       $mydb = "mydatabase";
       $table_name = "Products";
       $connect = mysqli_connect($server, $user, $pass);
       if (!$connect) {
         die ("Cannot connect to $server using $user");
       } else {
         $SQLcmd = "create table $table_name(ProductID int unsigned not null auto_increment primary key, Product_desc varchar(50), Cost int, Weight int, Numb int)";
         mysqli_select_db($connect,$mydb);
         if (mysqli_query($connect,$SQLcmd)) {
           print '<font size="4" color="blue" > Created Table ';
           print "<i>$table_name</i> in database <i>$mydb</i><br></font>";
           print "<br>SQLcmd=$SQLcmd";
          } else {
            die ("Table create creation failed SQLcmd=$SQLcmd");
          }
          mysqli_close($connect);
       }
    ?>
  </body>
</html>
