
   
<!DOCTYPE html>
<html>
<head>
	<title>Date time processing</title>
</head>
<body>
	<form >
		Enter your name and select data and time for the appointment
		<table>
			<tr>
				<td>Your name : </td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Date : </td>
				<td>
					<select name="day">
						<?php 
							for($i=1; $i<32; $i++){
								print "<option> $i </option>";
							}
						 ?>
					</select>
				
					<select name="month">
						<?php 
							for($i=1; $i<13; $i++){
								print "<option> $i </option>";
							}
						 ?>
					</select>
				
					<select name="year">
						<?php 
							for($i=1900; $i<2023; $i++){
								print "<option> $i </option>";
							}
						 ?>
					</select>
					
				</td>
			</tr>
			<tr>
				<td>Time : </td>
				<td>
					<select name="hour">
						<?php 
							for($i=0; $i<24; $i++){
								print "<option> $i </option>";
							}
						 ?>
					</select>
				
					<select name="minute">
						<?php 
							for($i=0; $i<60; $i++){
								print "<option> $i </option>";
							}
						 ?>
					</select>
				
					<select name="second">
						<?php 
							for($i=0; $i<60; $i++){
								print "<option> $i </option>";
							}
						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right"><input type="submit" value="Submit"></td>
				<td align="left"><input type="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	<?php 
		if(array_key_exists("name", $_GET)){
			$name = $_GET["name"];
			$day = $_GET["day"];
			$month = $_GET["month"];
			$year = $_GET["year"];
			$hour = $_GET["hour"];
			$minute = $_GET["minute"];
			$second = $_GET["second"];
                        $check = 1;
			print "Hi, $name ! <br />";
			print "You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year <br />";
			print "More information <br /> In 12 hours, the time and date is ";

			$date= date_create("$year-$month-$day $hour:$minute:$second");
			print( date_format($date," h:i:sA, d/m/Y"));
			print("<br />");

			if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
				print("This month has 31 days");
                           
			} elseif ($month != 2){
				print("This month has 30 days");
                                if($day == 31)
                                {
                                    $check = 0;
                                }
			} else {
				if($year % 100 == 0 && $year % 400 == 0){
					print( "This month has 29 days");
				} elseif ($year % 4 == 0 && $year % 10 != 0) {
					print("This month has 29 days");
				} else {
					print("This month has 28 days");
                                        if($day == 29)
                                        {
                                            $check = 0;
                                        }
				}
                                if($day > 29)                               
                                {
                                     $check = 0;
                                }
			}
                           if($check == 0)
                           {
                               print("<br>Invalid Date");
                           }
		}
	 ?>
</body>
</html>
