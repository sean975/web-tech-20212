<html>
    <head>
        <title>Receiving input</title>
    </head>
    <body>
        <?php
            $username =  $_POST["username"];
            $class = $_POST["class"];
            $university = $_POST["university"];
            $hobby = $_POST["hobby"];
            $n = count($hobby);
            print ("<br>Hello, $username");
            print ("<br>You are studying at $class, $university");
            print ("<br>Your hobby is");
            for($i=0; $i<$n; $i++){
                $s=$i+1;
                print("<br>$s. $hobby[$i]");
            }


        ?>
    </body>
</html>