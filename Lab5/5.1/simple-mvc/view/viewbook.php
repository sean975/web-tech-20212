<html>
<head>
	<style>
		table {
			width: 50%;
			margin-left: auto;
			margin-right: auto;
			margin-top: 50px;
		}
		table, th, td {
			border: 0.5px solid;
		}
		th {
			background-color: palevioletred;
		}
		th, td {
			height: 35px;
			padding: 10px;
		}
	</style>
</head>

<body>
	<table>
		<tbody>
			<tr>
				<th>Title</th>
				<?php echo '<td>'. $book->title . '</td>' ?>
			</tr>
			<tr>
				<th>Author</th>
				<?php echo '<td>'. $book->author . '</td>' ?>
			</tr>
			<tr>
				<th>Description</th>
				<?php echo '<td>'. $book->description . '</td>' ?>
			</tr>
		</tbody>
	</table>

</body>
</html>