<html><head>
    <title>Create Table</title>
        <style>
            table{
                padding: 16px;
                border: 1px solid black;
                width: 100%;
            }
            tr:hover{
                background-color: #cccccc;
            }
            .element_input{
                width: 100%;
                margin: 16px;
            }
            .element_input div{
                flex: 1;
            }
            .element_input input{
                flex: 3;
                margin-right: 8px;
            }
            .selected {
                background-color: #cccccc;
            }
        </style>
        <script type="text/javascript">
            function clickCategory() {
                document.getElementById('add').setAttribute("value", "Add another business");
            }
            function selected(ele) {
                var id = ele.id;
                var element = document.getElementById(id);
                element.classList.add("selected");
                element.setAttribute("name", "category[]");
            }
        </script>
    </head>

    <body>
        <h1>Business Registration</h1>
        <form action="add_biz.php" method="post">
            <div style="display: flex">
                <div style="flex: 1">
                    <form>
                        <div>Click on one, or control-click on multiple categories:</div>
                        <div style="height: 50px">
                            <select name="category[]" multiple>
                                <?php
                                $server = 'localhost';
                                $user = 'root';
                                $pass = '';
                                $mydb = 'business_service';
                                $table_name = 'categories';
                                $connect = mysqli_connect($server, $user, $pass, $mydb);
                                if (!$connect) {
                                    die("Cannot connect to $server using $user");
                                } else {

                                    $SQLcmd = "SELECT * FROM $table_name";
                                    $result = mysqli_query($connect, $SQLcmd);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_array()) {
                                            $id = $row['CategoryID'];
                                            print "<option value='$id'>" . $row['Title'] . "</option>";
                                        }
                                        $result->free();
                                    } else {
                                        print "Không có bản ghi nào được tìm thấy.";
                                    }

                                    mysqli_close($connect);
                                }
                                ?>

                            </select>
                        </div>
                </div>
                <div style="flex: 3; padding-right: 8px">
                    <div class="element_input" style="display: flex">
                        <div>Business Name</div> <input type="text" name="name">
                    </div>
                    <div class="element_input" style="display: flex">
                        <div>Address</div> <input type="text" name="address">
                    </div>
                    <div class="element_input" style="display: flex">
                        <div>City</div> <input type="text" name="city">
                    </div>
                    <div class="element_input" style="display: flex">
                        <div>Telephone</div> <input type="text" name="telephone">
                    </div> 
                    <div class="element_input" style="display: flex">
                        <div>URL</div> <input type="text" name="url">
                    </div>
                    <input id="add" type="submit" onclick="clickCategory()" value="Add Business" >
                </div>
            </div>
        </form>
        <?php
        if (array_key_exists("name", $_POST)) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $tel = $_POST['telephone'];
            $url = $_POST['url'];

            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $mydb = 'business_service';
            $table_name = 'businesses';
            $connect = mysqli_connect($server, $user, $pass, $mydb);

            if (!$connect) {
                die("Cannot connect to $server using $user");
            } else {
                $SQLcmd = "INSERT INTO $table_name (BusinessID, Name, Address, City, Telephone, URL) VALUES (0,'$name','$address','$city','$tel','$url') ";
                $result = mysqli_query($connect, $SQLcmd);
                $SQLcmd2 = "SELECT * from $table_name where Name = '$name' and Address = '$address'";
                $result2 = mysqli_query($connect, $SQLcmd2);
                $row = mysqli_fetch_array($result2);
                $id = $row['BusinessID'];
                $category = $_POST["category"];
                foreach ($category as $categoryId) {
                    $query = "insert into biz_categories(BusinessID ,CategoryID)
					value($id, '$categoryId');";
                    mysqli_query($connect, $query);
                }
                mysqli_close($connect);
            }
        }
        ?>

    </body>
</html>



