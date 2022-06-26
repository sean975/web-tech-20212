<html>
<head>
	<style>
		table {
			width: 60%;
			margin-left: auto;
			margin-right: auto;
			margin-top: 50px;
		}
		table, th, td{
			border: 1px solid blue;
		}
		th{
			background-color: wheat;
		}
		tr{
			height: 40px;
			padding: 10px;
		}
	</style>
</head>

<body>
	<table>
		<tbody>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Title</th>
			</tr>
		</tbody>
		<?php 

		foreach ($books as $title => $book)
		{
			echo '<tr>
					<td><a href="index.php?book='.$book->title.'">'.$book->title.'</a></td>
					<td>'.$book->author.'</td>
					<td>'.$book->description.'</td>
				</tr>';
		}

	?>
	</table>

</body>
</html>