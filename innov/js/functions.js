
// Get the list of products in the system from webservice data.
function getProductList(products){
	var productList = "<ul>";
	for(var i=0; i<products.length; i++){
		productList += "<li> <a href='#' onclick='showProductInventories(" + products[i].id + ")'>" + products[i].name + "</a></li>";
	}
	productList += "</ul>";
	return productList;
}

//Get the list of suppliers 
function getSupplierList(suppliers){
	var supplierList = "<h3>Nearby Suppliers</h3><ul>";
	for(var i=0; i<suppliers.length; i++){
		var productList = "";
		for(var j=0; j<suppliers[i].products.length; j++){
				productList += "<a href='#' onclick='showProductInventories(" + suppliers[i].products[j].id + ")'>" + 
				suppliers[i].products[j].type + "</a>";
				if(j < suppliers[i].products.length - 1)
					productList += ", ";
			}
		supplierList += "<li> <a href='#'><b>" + suppliers[i].name + ":</b></a><br>&nbsp&nbsp&nbsp&nbsp" + productList + "</li>";
	}
	supplierList += "</ul>";
	return supplierList;
}

//Show the inventories of the selected product showing the suppliers and stockists 
function showProductInventories(productId){
	var productName = "";
	for(var i=0; i<products.length; i++){
		if(products[i].id == productId){
			productName = products[i].name;
			break;
		}
	}
	var stockistList= "<ul>";
	for(var i=0; i<stockists.length; i++){
		var productsHeld = "";
		for(var j=0; j<stockists[i].products.length; j++){			
			if(stockists[i].products[j].id == productId){
				for(var k=0; k<suppliers.length; k++){
					if(suppliers[k].id == stockists[i].products[j].supplier){
						'<a href="mailto:' + suppliers[i].email + '" target="_top">'+suppliers[i].email+'</a>'
						productsHeld += "<a href='mailto:"+ suppliers[k].email + "' >" + suppliers[k].name + "(" + stockists[i].products[j].qty + ")</a>, " ;						
					}
				}
			}					
		}
		if(productsHeld != "")
		stockistList += "<li><a href='#'><b>" + stockists[i].name + "</b></a>: <br>&nbsp&nbsp&nbsp&nbsp" + productsHeld + "</li>";		
	}
	stockistList += "</ul>";
	
	$('#product-supplier-list').html("<h3>" + productName + "</h3> <i><small>(Click on one of the suppliers below to send an email.)</small></i> " + stockistList);
	$('#product-supplier-list').show();
	$('#clear-supplier-filter').show();
	$('#supplier-list').hide();
}

// Convenience function to clear the selected product and show the full suppliers list
function clearSupplierView(){
	$('#product-supplier-list').hide();
	$('#clear-supplier-filter').hide();
	$('#supplier-list').show();
}