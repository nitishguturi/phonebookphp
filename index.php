<!DOCTYPE html>
<html>
<head>
	<title>Phone Book</title>
	<link rel="stylesheet" type="text/css" href="dist/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!-- Header Area -->
	<div class="container text-center">
		<div class="row">
			<div class="header col-md-12">
				<a href="index.php"><h1>Phone Book</h1></a>
			</div>
		</div>
	</div>

	<!-- Input Part -->
	<div class="container text-center">
		<div class="row">
			<div class="input_area col-md-12">
				<form method="post" action="">
					<button type="submit" name="add_button">Add New</button>
				</form>
			</div>
		</div>
	</div>

<?php

require_once('inc/db_connect.php');

$show_query = "SELECT * FROM contacts";

$result = mysqli_query($con,$show_query);

while ($row = mysqli_fetch_assoc($result)) {
	$contacts[] = $row;
}

$serial_no = 0;


if (isset($_POST['add_button'])) {
	header('Location: addnew.php');
}

?>


	<!-- Show Data -->
	<div class="container text-center">
		<div class="row">
			<div class="show_data_area col-md-12">
				<table class="table col-md-12">
					<tr class="success">
						<td>#</td>
						<td>Name</td>
						<td>Phone</td>
						<td>Action</td>
					</tr>
<?php foreach ($contacts as $contact) { $serial_no++; ?>
					<tr>
						<td><?php echo $serial_no; ?></td>
						<td><?php echo $contact['name']; ?></td>
						<td><a href="tel:<?php echo $contact['phone']; ?>"><?php echo $contact['phone']; ?></a></td>
						<td><a class="btn btn-success" href="showdetails.php?id=<?php echo $contact['id']; ?>">Show Details</a></td>
					</tr>
<?php } ?>			
				</table>
			</div>
		</div>
	</div>
	<!-- Footer Part -->
	<div class="container text-center">
		<dir class="row">
			<dir class="col-md-12 footer">
				<p class="col-md-12">Application Developed By <a href="http://www.facebook.com/mdmortuza.hossain/">nitish guturi</a></p>
			</dir>
		</dir>
	</div>



	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/scrolltop.js"></script>
	<script src="dist/bootstrap/bootstrap.min.js"></script>
</body>
</html>
