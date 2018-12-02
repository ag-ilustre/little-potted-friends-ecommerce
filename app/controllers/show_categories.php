<?php 
	require "connect.php";

	$sql = "SELECT * FROM tbl_categories";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "
			<li class='list-group-item'>
				<a class='dropdown-item' onclick='showCategories($row[id])'>$row[name]</a>
			</li>";
		}
	}
?>	   