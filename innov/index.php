<?php
include("includes/functions.inc.php");

// Fetch the suppliers, products and stockist data by consuming a JSON webservice
$suppliers = jsonGETUsingCurl('http://45.79.135.154:8080/innov/webservice/data.php?query=suppliers');
$products = jsonGETUsingCurl('http://45.79.135.154:8080/innov/webservice/data.php?query=products');
$stockists = jsonGETUsingCurl('http://45.79.135.154:8080/innov/webservice/data.php?query=stockists');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700|Open+Sans:400,300,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>			
		<link rel="stylesheet" href="css/layout.css">
		<script type="text/javascript" src="js/functions.js"></script>
		<title>Buyer's Tool - Innovation Developer Challenge</title>		
		<script type="text/javascript">
			var products; var suppliers; var stockists;
			function init(){
				products = JSON.parse('<?php echo $products; ?>');
				suppliers = JSON.parse('<?php echo $suppliers; ?>');
				stockists = JSON.parse('<?php echo $stockists; ?>');
				$('#product-list').html(getProductList(products));				
				$('#supplier-list').html(getSupplierList(suppliers));
			}
			document.addEventListener('DOMContentLoaded', init, false);
		</script>
	</head>
	<body>		
		<div id='wrapper'>
			<div id='header'>
				<div id='logoContainer'>
					<div>
						  <h2>Buyer's Tool</h2>
						  <h4>Innovation Developer Challenge</h4>
						  <p><?php $currentDate =  getdate(); echo $currentDate['weekday'] . " " . $currentDate['mday'] . ", " . $currentDate['month'] . " " . $currentDate['year']; ?> </p>

					</div>
				</div>
				<div id='userDetail'>
					<div>
						<p><?php echo "Welcome " . getUserName(); ?></p>
					</div>
				</div>
				<div></div>
			</div>
			<div id='menu'>
				<ul class="nav nav-tabs">
					<li class="active"><a href="index.php">Home</a></li>
					</ul>
			</div>
			<div id="content">
				<div class="full-width">
					<div class="indent">
						<div id="products-container">
							<h3>Products</h3>
							<div id="product-list">								
							</div>
						</div>
						<div id="suppliers-container">	
							<a id="clear-supplier-filter" href="#" onClick="clearSupplierView()">Show All Suppliers</a>
							<div id="supplier-list">
							</div>
							<div id="product-supplier-list">
							</div>
						</div>
					</div>
				</div>
			</div>
	</body>	
</html>