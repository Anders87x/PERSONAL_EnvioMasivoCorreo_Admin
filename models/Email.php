<?php
require('class.phpmailer.php');
include("class.smtp.php");

require_once("../config/conexion.php");
require_once("../models/Producto.php");

require_once("../models/Usuario.php");

class Email extends PHPMailer{

    protected $gCorreo="";//Correo Electronico 
    protected $gContrasena="";//Contraseña del la cuenta de correo

    

    public function enviar_correo(){

        $producto = new Producto();
        $datos = $producto->get_producto();
        $tbody = "";
        foreach ($datos as $row){
            $tbody .=
            '
            <tr style="border-collapse:collapse"> 
              <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px"> 
               <!--[if mso]><table style="width:820px" cellpadding="0" cellspacing="0"><tr><td style="width:315px" valign="top"><![endif]--> 
               <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left"> 
                 <tr style="border-collapse:collapse"> 
                  <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:315px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr style="border-collapse:collapse"> 
                      <td align="center" style="padding:0;Margin:0;font-size:0px"><img src="'.$row["prod_img"].'" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="315"></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td><td style="width:20px"></td><td style="width:485px" valign="top"><![endif]--> 
               <table cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                 <tr style="border-collapse:collapse"> 
                  <td align="left" style="padding:0;Margin:0;width:485px"> 
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                     <tr style="border-collapse:collapse"> 
                      <td align="left" style="padding:0;Margin:0;padding-top:30px"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;color:#3d85c6" class="brand">Cupón : '.$row["prod_cupon"].'</h5></td> 
                     </tr> 
                     <tr style="border-collapse:collapse"> 
                      <td class="es-m-txt-l" align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px"><h3 class="product-name" style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333">'. $row['prod_nom'].'</h3></td> 
                     </tr> 
                     <tr style="border-collapse:collapse"> 
                      <td align="left" style="padding:0;Margin:0;padding-bottom:15px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#999999;font-size:14px" class="product-description">'.$row["prod_descrip"].'</p></td> 
                     </tr> 
                     <tr style="border-collapse:collapse"> 
                      <td style="padding:0;Margin:0"> 
                       <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                         <tr style="border-collapse:collapse"> 
                          <td align="left" style="padding:0;Margin:0;width:130px"><span class="es-button-border" style="border-style:solid;border-color:#3D5CA3;background:#FFFFFF;border-width:2px;display:inline-block;border-radius:4px;width:auto"><a href="'.$row["prod_url"].'" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#3D5CA3;font-size:16px;border-style:solid;border-color:#FFFFFF;border-width:10px 15px 10px 15px;display:inline-block;background:#FFFFFF;border-radius:4px;font-family:arial, "helvetica neue", helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center">Ir al Curso</a></span></td> 
                          <td align="left" style="padding:0;Margin:0"> 
                           <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                             <tr style="border-collapse:collapse"> 
                              <td class="es-m-txt-l" align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;padding-left:10px"><h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#666666" class="price">Antes : <s style="text-decoration:line-through">'.$row["prod_precion"].'</s>&nbsp; &nbsp; &nbsp; Ahora : '.$row["prod_preciod"].'</h3></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td></tr></table><![endif]--></td> 
             </tr>
            ';
        }

        $usuario = new Usuario();
        $datos2 = $usuario->get_usuario();

        $this->IsSMTP();
        $this->Host = 'smtp.office365.com';
        $this->Port = 587;
        $this->SMTPAuth = true;

        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->FromName = "Cupones de Descuento Udemy";
        $this->CharSet = 'UTF8';

        foreach ($datos2 as $row2) {
            $this->addBCC($row2["usu_correo"]);
        }

        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Cupones de Descuento Udemy";
        $cuerpo = file_get_contents('../public/Template_Producto.html');
        $cuerpo = str_replace('$tbldetalle', $tbody, $cuerpo);
        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Descuentos");
        return $this->Send();
    }
}
?>