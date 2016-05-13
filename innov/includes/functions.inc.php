<?php   
   
/*
 * Stub method for displaying the current user.
*/
function getUserName(){
	return "Jane Doe";
}
/* 
 * Consumes a JSON webservice to fetch data.  In this
 * project the products, suppliers and stockists data is fetched from
 * a webservice using this function.
 * 
 * Called from Index.php.
 */
function jsonGETUsingCurl($url)
{
	$ch = curl_init ();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json',
												'Connection: Keep-Alive'));
	curl_setopt ($ch, CURLOPT_HTTPGET, true);
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt ($ch, CURLINFO_HEADER_OUT, true);
	$response = curl_exec ($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close ($ch);
	
	if ($status == 201 || $status== 200 )
	{			
		return $response;
	}
	return null;	
}
?>