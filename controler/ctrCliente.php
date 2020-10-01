<?php 
ini_set('display_errors', 'On');

use PHPMailer\PHPMailer\PHPMailer;
require'../model/conexion.php';
require'../model/mdlCliente.php';
require'../controler/ctrValidarCampos.php';
require'../PHPMailer/vendor/autoload.php';



$objValidacionCampos= new CtrValidarCampos();


switch (@$_POST['Cliente']) {


    case 'addCliente':
            $boolean_validacion=true;
            $ValidarCampos=array(
                'validacion_correo'=>$objValidacionCampos->validaEmail(@$_POST['inputEmailCliente']),
                'soloLetrasInputNombre'=>$objValidacionCampos->solo_letras(@$_POST['inpuNameCliente']),
                'soloLetrasInputApellido'=>$objValidacionCampos->solo_letras(@$_POST['inputApellidoCliente']),
                'CamposVaciosInputApellido'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inputApellidoCliente']),
                'CamposVaciosInputNombre'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inpuNameCliente']),
                'CamposVaciosInputCoreeo'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inputEmailCliente']),
                'CamposVaciosInputPassword'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inputPasswordCliente']),
                'longitudCaracteresNombre'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inpuNameCliente']),
                'longitudCaracteresApellido'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inputApellidoCliente']),
                'validacion_password_longitud'=>$objValidacionCampos->validar_password(@$_POST['inputPasswordCliente'])
            );
            foreach ($ValidarCampos as $key => $value) {// recorrer todas las respueta de los campos vacios
                
                if($value==false){//si llega vacio hacer imprimir
                    
                    //echo'<br>'.$key .' '.$value;
                    $boolean_validacion=false;
                }
            }
            //=====Verificar Validacion
            ($boolean_validacion==true)? $respuesta=ModeloCliente::sqlAddCliente(@$_POST):$respuesta=array('mensaje'=>"Caracteres no permitidos ","arrayValidacion"=>$ValidarCampos);
            die(json_encode($respuesta));
            // die(json_encode($respuesta));
            break;


        case 'loginCliente':
                //=================Validcacion de Campos=========================
                //=================Validcacion de Campos=========================
                $boolean_validacion=true;
                $ValidarCampos=array(
                    'validacion_correo'=>$objValidacionCampos->validaEmail(@$_POST['inputEmailCliente']),
                    'validacion_password_longitud'=>$objValidacionCampos->validar_password(@$_POST['inputPasswordCliente'])
                 );
                 foreach ($ValidarCampos as $key => $value) {// recorrer todas las respueta de los campos vacios
			
                    if($value==false){//si llega vacio hacer imprimir
                        
                        //echo'<br>'.$key .' '.$value;
                        $boolean_validacion=false;
                    }
                }
                //=================Verificar el password para darle ingreso al sistema=========================
                //=================Verificar el password para darle ingreso al sistema=========================
                //=================Verificar el password para darle ingreso al sistema=========================
                if($boolean_validacion==true){//validacion de campos campos ññenps
                    $respuesta=ModeloCliente::sqlLoginCliente(@$_POST['inputEmailCliente']);

                    //print_r($respuesta);
                    if ($respuesta) {//verificar si existe el correo del usuario
                        if( password_verify(@$_POST['inputPasswordCliente'],@$respuesta['password']) ){

                                @session_start();
                                @$_SESSION['id_cliente']=$respuesta['id'];
                                @$_SESSION['usuario']=$respuesta['nombre'];
                                @$_SESSION['tipo_usuario']=$respuesta['tipo_usuario'];
                                @$_SESSION['apellido']=$respuesta['apellido'];
                                @$_SESSION['fechaRegistro']=$respuesta['fechaRegistro'];
    
                                 $respuesta=array(
                                     'respuesta'=>'true_password',
                                     'usuario'=>$respuesta['nombre'],
                                     'rol'=>$respuesta['tipo_usuario'],
                                     'apellido'=>$respuesta['apellido']
                                 );
                        
    
                            }
    
                            else{
                                $respuesta=array(
                                    'respuesta'=>'Contraseña Incorrecta'
                                );
                            
                            }
                    }else{
                            $respuesta=array(
                                'respuesta'=>'Correo Incorrecto'
                            );
                        
                        }
                }else{
                    $respuesta=array('respuesta'=>" Caracteres no permitidos ","arrayValidacion"=>$ValidarCampos);
                   
                }

            die(json_encode($respuesta));
            
            break;

        case 'editCliente':
           
            $boolean_validacion=true;
            $ValidarCampos=array(
                'soloLetrasInputNombre'=>$objValidacionCampos->solo_letras(@$_POST['inpuNameCliente']),
                'soloLetrasInputApellido'=>$objValidacionCampos->solo_letras(@$_POST['inputApellidoCliente']),
                'CamposVaciosInputApellido'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inputApellidoCliente']),
                'CamposVaciosInputNombre'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inpuNameCliente']),
                'longitudCaracteresNombre'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inpuNameCliente']),
                'longitudCaracteresApellido'=>$objValidacionCampos->validar_campos_vacios(@$_POST['inputApellidoCliente'])
            );
            foreach ($ValidarCampos as $key => $value) {// recorrer todas las respueta de los campos vacios
                
                if($value==false){//si llega vacio hacer imprimir
                    
                    //echo'<br>'.$key .' '.$value;
                    $boolean_validacion=false;
                }
            }
            //=====Verificar Validacion
            ($boolean_validacion==true)? $respuesta=ModeloCliente::sqlEditarCliente(@$_POST):$respuesta=array('mensaje'=>"Caracteres no permitidos ","arrayValidacion"=>$ValidarCampos);
            die(json_encode($respuesta));
            break;


        case 'recuperarContraseña':
    
            //validacion del correo
            $boolean_validacion=true;
            $ValidarCampos=array(
                'validacion_correo'=>$objValidacionCampos->validaEmail(@$_POST['inputEmailCliente'])
            );
            foreach ($ValidarCampos as $key => $value) {// recorrer todas las respueta de los campos vacios
                
                if($value==false){//si llega vacio hacer imprimir
                    
                    $boolean_validacion=false;
                }
            }
            //=====Verificar Validacion
            if($boolean_validacion==true){
                //1. Comprobar si el correo esta en la base de datos
                $respuestaCorreoExistente=ModeloCliente::sqlLoginCliente(@$_POST['inputEmailCliente']);
                if ($respuestaCorreoExistente) {//verificar si existe el correo del usuario
                    //2. generar una contraseña aleatoria
                    function generarPassword($longitud){
                        $key="";
                        $patron="1234567890abcdefghijklmnopqrstuvwxyz";
                        $max=strlen($patron)-1;
    
                        for ($i=0; $i < $longitud; $i++) { 
                            # code...
                            $key.=$patron{mt_rand(0,$max)};
                        }
                        return $key;
                    }
                    $nuevoPassword=generarPassword(10);
                    // Enviar los datos a la base de datos para actializarlos
                    $respuestaClienteBD=ModeloCliente::sqlEditarPasswordCliente(array('datosBdCliente'=>$respuestaCorreoExistente,'passwordNuevo'=>$nuevoPassword));
                    if($respuestaClienteBD['respuesta']=='exito'){
                        //enviamos al correo el nuevo password
                        $mail=new PHPMailer();
                        $mail->CharSet='UTF-8';
                        $mail->isMail();
                        $mail->setFrom('jmmorochoaunl.edu.ec@gmail.com','Proeditsclub.com');
                        $mail->addReplyTo('jmmorochoaunl.edu.ec@gmail.com','Proeditsclub.com');
                        $mail->Subject=('Solicitud de nueva contraseña Proeditsclub.com');
                        $mail->addAddress(@$_POST['inputEmailCliente']);
                        $mail->msgHTML('<div style="width: 100%; height: 30%; position: relative;font-family:sans-serif ; padding-bottom: 40px;">
                                            <center>
                                                
                                                    <img src="http://www.proeditsclub.com/img/logo-red-black.png" alt="" style="padding: 20px;" width="40%" height="20%">
                                            </center>
                                        </div>
                                    
                                        <div style="position: relative; width: 100%; background: white; padding: 20px; ">
                                            <center>
                                                <img src="http://proeditsclub.com/img/contraseña.png" alt="" width="10%" height="10%">
                                                <h3 style="font-weight: 100px; background: whitesmoke;">
                                                    Su nueva contraseña es : '.$nuevoPassword.'
                                                    <hr style="border: 1px solid #ccc; width: 80%;">
                                                </h3>
                                                <h4 style="font-weight: 100;color:#999 ; padding: 0 20px;">
                                                    Acceda con esta contraseña temporal  y despues puede cambiar su contraseña en su panel de administracion.
                                                </h4>
                                    
                                                <a href="https://proeditsclub.com/login.php" style="color: white; text-decoration: none;" target="_blank">
                                                
                                                    <div style="line-height: 60px;background: #FD0002; width: 60%; color: white; font-size: 20px;">Ir a Proeditsclub.com
                                                    </div>
                                                </a>
                                            </center>
                                        </div>');

                        $envio=$mail->Send();
                        if ($envio==true) {
                            # code...
                            return die(json_encode(array('respuesta'=>'correoEnviado')));
                           // echo "correo enviado";
                        }else{
                            //echo "correo no enviado";
                            return die(json_encode(array('respuesta'=>'correoNoEnviado')));
                        }
                    }else{
                        //echo "no se pudo actualizar el contraseña";
                        return die(json_encode(array('respuesta'=>'noSeActualizoPasswordBD')));
                    }
                    //echo "La nueva contraseña es igual a ".generarPassword(10); 
               }else{
                   return die(json_encode(array('respuesta'=>'correoNoExiste')));
                }

            }else{
                return die(json_encode(array('respuesta'=>'caracteresNoPermitidos')));
            }
            break;
    
    default:
        # code...
        break;
}

?>