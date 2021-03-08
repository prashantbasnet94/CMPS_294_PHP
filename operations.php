if($operation == 'add' ){
	
	$string = $title . '%'  . $author . '%' . $isbn . '%' . $publisher . '%' . $year;

	fwrite($file,$string. "\n");
	$_SESSION['message'] =  "Boom has been added to the database file";
	header("Refresh:0; url = result_page.php");
} else if($operation == 'delete'){

	$string = $title . '%'  . $author . '%' . $isbn . '%' . $publisher . '%' . $year;
	
	$contents  =file_get_contents($file_location);
	$contents = str_replace($string. "\n",'',$contents);
	file_put_contents($file_location,$contents);

	$_SESSION['message'] = "Book has been deleted from the database file"
	header("Refresh:0; url=result_page.php")
}else if( $operation == 'search'){
	
	unset($_SESSION['message']);
	$string = $title . '%'  . $author . '%' . $isbn . '%' . $publisher . '%' . $year;

	header('Content-Type: text/plain');

	$contents = file_get_contents($file_location);
	$pattern = preg_quote($stirng,'/');

	$pattern ="/^.*$pattern.*\$/m";

	if(preg_match_all($pattern,$contents,$results)){
		$_SESSION['search_result'] = $results[0];
	}else{
		$_SESSION['search_result'] = "no matches found";
	}
	header("Refresh:0,url=result_page.php");

}