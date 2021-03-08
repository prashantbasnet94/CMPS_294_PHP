
<?php
session_start();

if(isset($_POST['submit'])) {

	if(empty($_POST["title"])){
		$_SESSION['titleErr']="Title is required"
	} else{
		$title = $_SESSION['title']=$_POST['title'];
	}

	if(empty($_POST["author"])){
		$_SESSION['authorErr']="Author is required"
	}else{
		$author = $_SESSION['author']=$_POST['author'];
	}

	if(empty($_POST["isbn"])){
		$_SESSION['isbn']="ISBN is required"
	}else{
		$isbn = $_SESSION['isbn']=$_POST['isbn'];
	}

	if(empty($_POST["publisher"])){
		$_SESSION['publisherErr']="publisher is required"
	}else{
		$publisher = $_SESSION['publisher']=$_POST['publisher'];
	}

	if(empty($_POST["year"])){
		$_SESSION['yearErr']="Year is required"
	}else{
		$title = $_SESSION['year']=$_POST['year'];
	}
	$operation = $_SESSION['operation'] = $_POST['operation']

	$file_location ="database.txt";
	$file = fopen($file_location,"a+");

	if(empty($title) | empty($author) | empty($isbn) | empty($publisher) | empty($year)){
		header("url=form.php")
	}
	
}

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
?>

