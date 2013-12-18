<html>
	<?php
	$formConnexion = false;
	// Formulaire d'authentification posté
	if (isset($_POST["authentification"]))
	{
		// Accès au webservice
		$wsdl_url = 'http://146.19.7.191:8080/test?wsdl' ;
		$client = new SoapClient($wsdl_url);
		$response = $client->verifConnection("admin", "azerty");
		var_dump($response);
		if ($response)
		{
			$formConnexion = true;
		}
		else
		{
			echo "La connexion a échoué.";
		}
	}
	
	?>
	
	<?php
		if (!$formConnexion)
		{
	?>
	<h1>Authentification</h1>
	<form action="login.php" name="authentification" method="POST" >
		Login : <input type="text" name="login" />
		Password : <input type="password" name="pass" />
		<input type="submit" name="submitLogin" value="Connexion" />
	</form>
	<?php
		}
		else
		{
			header('Location: hotel.php');
		}
	?>
</html>

