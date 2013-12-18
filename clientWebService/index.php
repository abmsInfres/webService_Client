<html>
	<?php
		$wsdl_url = 'http://146.19.7.191:8080/test?wsdl' ;
		$client = new SoapClient($wsdl_url);
		 
		//$response = $client->ResaHotel("Carleton", "24-12-2013");
		//print_r ($response);
	?>
	
	<?php
		$response = $client->getHotels();
		var_dump($response);
		echo $response;
		//echo <select name="ComboBox">;
		foreach ($response as $hotel){
			echo ('<option>' . print_r($hotel) .'</option>');
		}
	//</select>
	?>
	
	
</html>