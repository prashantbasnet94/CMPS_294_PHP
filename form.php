<div>
	<?php

		session_start();
		$_SESSION['titleErr'] = $_SESSION['authorErr'] = $_SESSION['isbnErr'] = $_SESSION['publisherErr'] = $_SESSION['yearErr'] = "";

	?>

	<form action="operations.php" method="post">
		<h5> Book Inverntory Management </h5>

		<select class="select" name="operation" id="operation">
			<option value="add"> Add new book </option>
			<option value="delete">Delete a book</option>
			<option value="search">Search a book</option>
		</select>

		<h5>Book Fields </h5>
		<div>
			<label>Title:</label>
			<input type="text" name="title" placeholder="Enter the book title here" required>
			<span><?php echo $_SESSION['titleErr']?></span>
		</div>

		<div>
			<label>Author:</label>
			<input type="text" name="author" placeholder="Enter the book author name here" required>
			<span><?php echo $_SESSION['authorErr']?></span>
		</div>

		<div>
			<label>ISBN:</label>
			<input type="text" name="isbn" placeholder="Enter the book ISBN here" required>
			<span><?php echo $_SESSION['isbnErr']?></span>
		</div>

		<div>
			<label>Publisher:</label>
			<input type="text" name="publisher" placeholder="Enter the book Publisher here" required>
			<span><?php echo $_SESSION['publisherErr']?></span>
		</div>

		<div>
			<label>Year:</label>
			<input type="text" name="year" placeholder="Enter the year book was published here" required>
			<span><?php echo $_SESSION['yearErr']?></span>
		</div>


		
	</form>

</div>