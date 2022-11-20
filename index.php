<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://apirestdesempleado-production.up.railway.app/empleo");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$respuesta = curl_exec($ch);
curl_close($ch);

$valores = json_decode($respuesta,TRUE);



?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>CHIA-API</h1>
            <div>
                <a href="#">Inicio</a>
                <a id="Agregar" href="./usuario.php">Agregar</a>
            </div>
        </header>
    <article id="listEmpleos">
        <section  class="List-empleados">
        <h1>Lista de Empleos</h1><br>
            <div class="ancho">
                <table class="table table-dark">
                    <tbody>
                        <tr>
                            <th width="80%">Descripción</th>
                            <th width="10%">--</th>
                            <th width="10%">--</th>
                        </tr>
                        
                        <?php foreach($valores as $dato) {  ?>
                        <tr>
                            
                            <td width="80%">
                                <form action="post">
                                <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $dato['Id']; ?>">
                                <input type="hidden" name="ind" id="ind" value="<?php echo $ind; ?>">
                                
                                <h2><?php echo $dato['tipoEmpleo']; ?></h2><br>
                                <p><?php echo $dato['empresa']; ?> | $ <?php echo $dato['salario']; ?> | <?php echo $dato['lugar']; ?> | <buton name="btnInfo" value="Editar" class="vermas">Ver mas...</buton></p>
                                </form>
                            </td>
                            
                                <td width="10%">
                                    
                                </td>
                            
                            
                                <td width="10%">
                                    
                                </td>                           
                                
                        </tr>                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>  
    </article>

    </body>
</html>