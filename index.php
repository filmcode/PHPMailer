<?php
    //check if form was sent
    if($_POST){
        $to = 'gjaimes@galletamkt.com';
        
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $km = $_POST['km'];
        $ano = $_POST['ano'];
        $foto1 = $_POST['foto1'];

        $mensaje = $_POST['mensaje'];
        $subject = "Nueva Reservacion";
        $contenido = "Este mensaje fue enviado por: " . $name ."\nE-mail: " . $mail . "\nTelefono: " . $phone .  "\nmarca: " . $marca . "\nModelo: " . $modelo."\nKm Recorridos: " . $km."\nMensaje: " .$mensaje."\nFoto 1: " .$foto1;
        //honey pot field
        $honeypot = $_POST['firstname'];
        //check if the honeypot field is filled out. If not, send a mail.
        if( ! empty( $honeypot ) ){
            return; //you may add code here to echo an error etc.
        }else{
        
            mail( $to, $subject, $contenido);
            echo'<script type="text/javascript">
        alert("Formulario enviado correctamente, Gracias por tu solicitud, tu reservación será confirmada vía telefónica.");
        window.location.href="index.php";
        </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ford Guadalajara</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="image/favicon.png">
</head>
<body>

    <!-- Botones Burbuja -->
    <a href="https://api.whatsapp.com/send?phone=+523310430677" class="btn-wsp uk-flex uk-flex-middle uk-flex-center" target="_blank">
        <i class="fa fa-whatsapp icono"></i>
    </a>
    <a href="tel:+523310430677" class="btn-phone uk-flex uk-flex-middle uk-flex-center" target="_blank">
        <i class="fa fa-phone" aria-hidden="true"></i>
    </a>
  
    <?php include './vistas/header.php';?>

    <main>
        <section>
            <img src="./image/banner.jpg" style="width: 100%;" alt="">
        </section>
        <div class="uk-text-center" uk-grid>
            <div class="uk-width-1-4@m">
                <div class="uk-card uk-card-body"></div>
            </div>
            <div class="uk-width-expand@m">
                <div class="uk-card" style="margin: 0 0 2em 0">
                    <form class="form" name="formulario" action="#my-form" method="post" id="my-form">
                        <fieldset class="uk-fieldset">
                    
                            <h5 style="color: #2042a6;font-size: 1.25rem;">Llena este formulario con la información solicitada y nuestro especialista en seminuevos se pondrá en contacto contigo para brindarte una oferta por tu auto.</h5>
                    
                            <div class="uk-margin-remove">
                                <label for="nombre" style="font-size: 1.2em;color: black" class="uk-flex uk-flex-left">Nombre:</label>
                                <input class="uk-input" name="name" style="border-radius: 1em;padding: 1.5em; border-color: #2042a6" type="text">
                            </div>

                            <input style="display: none;" name="firstname" type="text" id="firstname" class="hide-robot">

                            <div class="uk-margin-remove">
                                <label for="mail" style="font-size: 1.2em;color: black" class="uk-flex uk-flex-left">Correo electrónico:</label>
                                <input class="uk-input" name="mail" style="border-radius: 1em;padding: 1.5em;border-color: #2042a6" type="text">
                            </div>

                            <div class="uk-margin-remove">
                                <label for="phone" style="font-size: 1.2em;color: black" class="uk-flex uk-flex-left">Teléfono:</label>
                                <input class="uk-input" name="phone" style="border-radius: 1em;padding: 1.5em;border-color: #2042a6" type="text">
                            </div>

                            <h5 style="color: #2042a6;font-size: 1.25rem;">Coloca la información del auto que quieres vender</h5>
                            
                            <div class="uk-margin-remove">
                                <label for="marca" style="font-size: 1.2em;color: black" class="uk-flex uk-flex-left">Marca:</label>
                                <input class="uk-input" name="marca" style="border-radius: 1em;padding: 1.5em;border-color: #2042a6" type="text">
                            </div>

                            <div class="uk-margin-remove">
                                <label for="modelo" style="font-size: 1.2em;color: black" class="uk-flex uk-flex-left">Modelo:</label>
                                <input class="uk-input" name="modelo" style="border-radius: 1em;padding: 1.5em;border-color: #2042a6" type="text">
                            </div>

                            <div class="uk-margin-remove">
                                <label for="km" style="font-size: 1.2em;color: black" class="uk-flex uk-flex-left">Kilometraje:</label>
                                <input class="uk-input" name="km" style="border-radius: 1em;padding: 1.5em;border-color: #2042a6" type="text">
                            </div>

                            <div class="uk-margin-remove">
                                <label for="ano" style="font-size: 1.2em;color: black" class="uk-flex uk-flex-left">Año:</label>
                                <select name="ano" style="border-radius: 1em;padding: 1.5em; border-color: #2042a6" class="uk-select">
                                    <option value=" " > </option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>

                            <h5 style="color: #2042a6;font-size: 1.25rem;">Sube imagenes de tu auto, para brindarte un mejor servicio.</h5>
                            <label for="foto1" class="uk-flex uk-flex-between" style="font-size: 1.2em;color: black; padding: .4em 0">Foto 1</label>
                            <div class="uk-flex uk-flex-left">
                                <input type="file" name="foto1" style="font-size: 1em" name="foto1" size="40" accept=".JPG,.PNG">
                            </div>
                            <label for="foto2" class="uk-flex uk-flex-between" style="font-size: 1.2em;color: black; padding: .4em 0">Foto 2</label>
                            <div class="uk-flex uk-flex-left">
                                <input type="file" name="foto2" style="font-size: 1em" name="foto2" size="40" accept=".JPG,.PNG">
                            </div>
                            <label for="foto3" class="uk-flex uk-flex-between" style="font-size: 1.2em;color: black; padding: .4em 0">Foto 3</label>
                            <div class="uk-flex uk-flex-left">
                                <input type="file" name="foto3" style="font-size: 1em" name="foto3" size="40" accept=".JPG,.PNG">
                            </div>
                            <label for="foto4" class="uk-flex uk-flex-between" style="font-size: 1.2em;color: black; padding: .4em 0">Foto 4</label>
                            <div class="uk-flex uk-flex-left">
                                <input type="file" name="foto4" style="font-size: 1em" name="foto4" size="40" accept=".JPG,.PNG">
                            </div>
                            <label for="foto5" class="uk-flex uk-flex-between" style="font-size: 1.2em;color: black; padding: .4em 0">Foto 5</label>
                            <div class="uk-flex uk-flex-left">
                                <input type="file" name="foto5" style="font-size: 1em" name="foto5" size="40" accept=".JPG,.PNG">
                            </div>

                            <div class="uk-margin-remove">
                                <label for="mensaje" style="font-size: 1.2em;color: black; padding: .4em 0" class="uk-flex uk-flex-left">Mensaje:</label>
                                <textarea name="mensaje" style="border-radius: 1em;padding: 1.5em; border-color: #2042a6" class="uk-textarea" rows="5"></textarea>
                            </div>
                            <p uk-margin>
                                <button type="submit" style="border-radius: 1em;" class="uk-button uk-button-secondary uk-button-large">Enviar</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="uk-width-1-4@m">
                <div class="uk-card uk-card-body"></div>
            </div>
        </div>
    </main>

    <?php include './vistas/footer.php';?>

    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/js/uikit-icons.min.js"></script>
</body>
</html>