<?php
require 'classes/database.php';

$database = new Database;

$database->query('SELECT * FROM table_name');
$rows = $database->resultset();

/*print_r($rows); //prints as arrays*/
?>

<h1>Posts</h1>
<div>
<?php foreach($rows as $row) : ?>
	<div>
		<h3><?php echo $row['title']; ?></h3>  //title is a column from our table containing titles
		<p><?php echo $row['body']; ?></p>    //body is a column from our table containing blog body
	</div>
<?php endforeach; ?>
</div>

