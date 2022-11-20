<?php
        
if(isset($_POST['btnA']))
{
    $empresa=$_POST['empresa'];
    $categoria=$_POST['categoria'];
    $tipoempleo=$_POST['tipoEmpleo'];
    $fecha=$_POST['fecha'];
    $salario=$_POST['salario'];
    $lugar=$_POST['lugar'];
    $telefono=$_POST['telefono'];
    $numpuesto=$_POST['numPuesto'];

    $datos=array(
        'empresa'=>$empresa,
        'categoria'=>$categoria,
        'tipoEmpleo'=>$tipoempleo,
        'fecha'=>$fecha,
        'salario'=>$salario,
        'lugar'=>$lugar,
        'telefono'=>$telefono,
        'numPuesto'=>$numpuesto
    );
    switch($_POST['btnA'])
    {
        
        case "Edit":
            $id=$_POST['id'];            

            $ch = curl_init();

            $archivo = json_encode($datos);            
            curl_setopt($ch, CURLOPT_URL, "https://apirestdesempleado-production.up.railway.app/empleo/".$id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $archivo);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            $data = curl_exec($ch);
            curl_close($ch);
            break;
        
        case "Agr":
            
            $ch = curl_init();

            $archivo = json_encode($datos);
            curl_setopt($ch, CURLOPT_URL, "https://apirestdesempleado-production.up.railway.app/empleo");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $archivo);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
            $data = curl_exec($ch);
            curl_close($ch);
            break;
    }
    header('location:usuario.php');
}



if(isset($_POST['btnA']))
{
    switch($_POST['btnA'])
    {
        case "Eliminar":

            $id=$_POST['id'];            

            $ch = curl_init();

            $archivo = json_encode($datos);            
            curl_setopt($ch, CURLOPT_URL, "https://apirestdesempleado-production.up.railway.app/empleo/".$id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            $data = curl_exec($ch);
            curl_close($ch);
            break;
    }
    header('location:usuario.php');
}
?>