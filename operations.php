if($operation == 'add' ){
	
	$string = $title . '%'  . $author . '%' . $isbn . '%' . $publisher . '%' . $year;

	fwrite($file,$string. "\n");
	$_SESSION['message'] =  "Boom has been added to the database file";
	header("Refresh:0; url = result_page.php");
}