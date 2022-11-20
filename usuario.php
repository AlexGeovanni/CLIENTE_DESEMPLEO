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
                <a href="./index.php">Inicio</a>
                <a id="Agregar" href="#">Agregar</a>
            </div>
        </header>
        <center>
    <article id="Modifica-agrega" class="agregar">        
        <section>
        <h1>Lista de Empleos</h1><br>
            <div class="ancho">
                <table class="table table-dark">
                    <tbody>
                        <tr>
                            <th width="80%">Descripción</th>
                            <th width="10%">--</th>
                            <th width="10%">--</th>
                        </tr>
                        <?php $ind=0; ?>
                        <?php foreach($valores as $dato) {  ?>
                        <tr>
                            
                            <td width="80%">
                                <h2><?php echo $dato['tipoEmpleo']; ?></h2><br>
                                <p><?php echo $dato['empresa']; ?> | $ <?php echo $dato['salario']; ?> | <?php echo $dato['lugar']; ?></p>
                            </td>
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $dato['Id']; ?>">
                                <input type="hidden" name="ind" id="ind" value="<?php echo $ind; ?>">
                                <td width="10%">
                                    <button id="buton" class="btn btn-warning" name="btnAction" value="Editar">Editar</button>
                                </td>
                            </form>
                            <form action="agregar.php" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $dato['Id']; ?>">
                                <td width="10%">
                                    <button id="buton" class="btn btn-danger" name="btnA" value="Eliminar">Eliminar</button>
                                </td>
                            </form>
                            <?php $ind=$ind + 1; ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br><br><br>
            </div>
        </section>
        
        <aside>
            <?php if(isset($_POST['btnAction'])){ 
                switch($_POST['btnAction'])
                {
                    case 'Editar':
                    $id=$_POST['id'];
                    $ind=$_POST['ind'];
                    ?>
                    <h1>Editar Empleo</h1>
                    <form action="agregar.php" method="post">
                        <label>Empresa</label><br>
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                        <input type="text" name="empresa" id="empresa" required="required"  value="<?php echo $valores[$ind]['empresa'] ?>">
                        <br><label>Categoria</label><br>
                        <input type="text" name="categoria" id="categoria" required="required" value="<?php echo $valores[$ind]['categoria'] ?>">
                        <br><label>Tipo</label><br>
                        <input type="text" name="tipoEmpleo" id="tipoEmpleo" required="required" value="<?php echo $valores[$ind]['tipoEmpleo'] ?>">
                        <br><label>Fecha</label><br>
                        <input type="date" name="fecha" id="fecha" required="required" value="<?php echo $valores[$ind]['fecha'] ?>">
                        <br><label>Salario</label><br>
                        <input type="number" name="salario" id="salario" required="required" value="<?php echo $valores[$ind]['salario'] ?>">
                        <br><label>Lugar</label><br>
                        <input type="text" name="lugar" id="lugar" required="required" value="<?php echo $valores[$ind]['lugar'] ?>">
                        <br><label>Telefono</label><br>
                        <input type="tel" name="telefono" id="telefono" maxlength="10" required="required" value="<?php echo $valores[$ind]['telefono'] ?>">
                        <br><label>Vacantes</label><br>
                        <input type="text" name="numPuesto" id="numPuesto" required="required" value="<?php echo $valores[$ind]['numPuesto'] ?>">
                        <br><br><button class="btn btn-primary" name="btnA" value="Edit">Editar</button>
                    </form>
            <?php break; } }else { ?>
                <h1>Agregar Empleo</h1>
                <form action="agregar.php" method="post">
                    <label>Empresa</label><br>
                    <input type="text" name="empresa" id="empresa" required="required">
                    <br><label>Categoria</label><br>
                    <input type="text" name="categoria" id="categoria" required="required">
                    <br><label>Tipo</label><br>
                    <input type="text" name="tipoEmpleo" id="tipoEmpleo" required="required">
                    <br><label>Fecha</label><br>
                    <input type="date" name="fecha" id="fecha" required="required">
                    <br><label>Salario</label><br>
                    <input type="number" name="salario" id="salario" required="required">
                    <br><label>Lugar</label><br>
                    <input type="text" name="lugar" id="lugar" required="required">
                    <br><label>Telefono</label><br>
                    <input type="tel" name="telefono" maxlength="10" id="telefono" required="required">
                    <br><label>Vacantes</label><br>
                    <input type="text" name="numPuesto" id="numPuesto" required="required">
                    <br><br><button class="btn btn-primary" name="btnA" value="Agr">Agegar</button>
                </form>
            <?php } ?>
        </aside>            
    </article>
    </center>
    </body>
</html>