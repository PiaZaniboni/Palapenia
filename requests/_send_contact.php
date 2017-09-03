
<?php

//$to = "hola@unbarco.com";
$to = "mpiazaniboni@gmail.com";
$subject = "Palapenia - Contacto desde sitio web";

$message =
	'<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background: white">
		<tr>
			<td height="20" colspan="3"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0">&nbsp;</h1></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td width="54">
				<a href="http://palapenia.com.ar" target="_blank">
					<img src="http://palapenia.com.ar/img/logo-mail.png" width="" height="" alt="Ir a sitio web de Ensimisma" title="Ir a sitio web de Ensimisma" border="0" align="middle" /></a></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0">Este email ha sido generado desde el formulario de contacto del sitio web  de palapenia.com.ar</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0; text-decoration: underline">Datos de contacto:</h1></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Nombre: </strong>' . $_POST["name"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>E-mail: </strong>' . $_POST["email"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Mensaje: </strong>' . $_POST["message"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
	</table>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: < Palapenia >' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to, $subject, $message, $headers)){
	echo 1;
	exit;
} else {
	echo 0;
	exit;
};

?>
