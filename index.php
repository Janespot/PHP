<?php
require 'classes/database.php';

$database = new Database;

/*print_r($rows); //prints as arrays*/

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if($post['submit']){
	$title = $post['title'];
	$body = $post['body'];
	//echo $title;

	$database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->execute();
	if($database->lastInsertId()){
		echo '<p>Post Added!</p>';
	}
}

$database->query('SELECT * FROM posts');// to add 'WHERE id = :id'...
//...add '$database->bind(':id', 1);'...where 1 is id number
$rows = $database->resultset();

?>

<!--Inserting data-->
<h1>Add post</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<label>Post Title</label><br />
	<input type="text" name="title" placeholder="Add a Title..." /><br /><br />
	<label>Post Body</label><br />
	<textasrea name="body"></textarea><br /><br />
	<input type="submit" name="submit" value="Submit" />
</form>

<h1>Posts</h1>
<div>
<?php foreach($rows as $row) : ?>
	<div>
		<h3><?php echo $row['title']; ?></h3>  <!--title is a column from our table containing titles-->
		<p><?php echo $row['body']; ?></p>    <!--body is a column from our table containing blog body-->
	</div>
<?php endforeach; ?>
</div>

