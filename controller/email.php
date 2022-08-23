<?php
require_once("../models/Email.php");
$email = new Email();

switch ($_GET["op"]) {
    case "enviarCorreo":
        $email->enviar_correo();
        break;
}
?>
