<table>
	<?php
	$file_location = 'database.txt';
	$file = fopen($file_location, "a+");
	$lines = file($file_location);

	if(sizeof($lines)>0){
		echo "<thead>
			 	<tr>
			 		<th> Title </th>
			 		<th> Author </th>
			 		<th> ISBN </th>
			 		<th> Publisher </th>
			 		<th> Year </th>
			 	</tr>
			  </thead>
			  <tbody>
			  <tr>";

			  foreach ($lines as $line) {
			  	$data = explode("%",$line);
			  	foreach ($data as $col) {
			  		echo "<td>" . $col . "</td>"
			  	}
			  	echo "</tr>"
			  }
	} else {
			echo "<tr> No data present in the file </tr>";
	}


	?>
</table>