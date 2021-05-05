<?php if(isset($_POST["name"]))  
{
	// Read the form values
	$success = false;
	$name = isset( $_POST['name'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['name'] ) : "";
	$assunto = isset( $_POST['assunto'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['assunto'] ) : "";
	$telefone = isset( $_POST['telefone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['telefone'] ) : "";
	$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$messageForm = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
	
	//Headers
	$to = "contato@higieldd.com";
	$subject = 'E-mail do Formulario do site';
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	
	//body message/
	//$message = "First Name: ". $fName . "<br> Email: ". $senderEmail . "<br> Message: " . $messageForm . "";

	$message = "
					<html>
						<head>
							<title>E-mail do Formul&aacute;rio de Contato do site</title>
						</head>
						<body style='font-size: 18px;'>
							<h2>". $assunto . "</h2>
							<p><span style='font-weight: bold;'>Nome: </span>". $name . "</p>
							<p><span style='font-weight: bold;'>Telefone: </span>". $telefone . "</p>
							<p><span style='font-weight: bold;'>E-mail: </span>". $senderEmail . "</p>
							<p><span style='font-weight: bold;'>Mensagem: </span> <br>" . $messageForm . "</p>
						</body>
					</html>
				";

	
	//Email Send Function
    $send_email = mail($to,$subject, $message, $headers);
      
    echo ($send_email) ? 'Mensagem enviada. Em breve entraremos em contato!' : 'Error: Email nao enviado.';
}
else
{
	echo ' Email não Enviado !';
}
?>
 
