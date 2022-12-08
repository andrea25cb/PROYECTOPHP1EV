<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSERTAR TAREA</title>
  <link href="estilos.css" rel="stylesheet" >
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
</head>
<body>
<?php
include('../vista/layout/encabezado.php');
include('../vista/layout/menuA.php'); 
?>
 <div class="container">
        <div class="centrar">
   <form action="../controlador/insertarTarea.php" method="POST" enctype="multipart/form-data">
    <br>
        <!--NIF  -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">NIF</span>
            <input type="text" class="form-control"class="form-control" type="text" name="nif" value="<?=isset($_POST['nif']) ? $_POST['nif']: ''?>">
            <?=VerError('nif')?>
        </div>
        <!--Nombre y Apellidos  -->
        <div class="input-group">
            <span class="input-group-text">Nombre y Apellidos  </span>
                <input class="form-control" type="text" name="nombre" value="<?=isset($_POST['nombre']) ? $_POST['nombre']: ''?>">
                <input class="form-control" type="text" name="apellidos" value="<?=isset($_POST['apellidos']) ? $_POST['apellidos']: ''?>">
            <?=VerError('nombre')?>
            <?=VerError('apellidos')?>
        </div><p>
        
        <!-- TLF -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">TLF</span>
            <input type="text" class="form-control" type="text" name="tlf" value="<?=isset($_POST['tlf']) ? $_POST['tlf']: ''?>">
        </div>
        <?=VerError('tlf')?>

             <!-- Descripción de la tarea -->
        <p>Descripción tarea:<br>
        <textarea class="form-control" name="descripcion" value="<?=isset($_POST['descripcion']) ? $_POST['descripcion']: ''?>"></textarea>
        <?=VerError('descripcion')?>

             <!-- Dirección -->
        <p>Dirección:<br>
        <textarea class="form-control" name="direccion" value="<?=isset($_POST['direccion']) ? $_POST['direccion']: ''?>"></textarea>
        <?=VerError('direccion')?>

             <!-- Correo Electrónico -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Correo electrónico</span>
            <input type="text" class="form-control"class="form-control" type="text" name="correo" value="<?=isset($_POST['correo']) ? $_POST['correo']: ''?>">
             <?=VerError('correo')?>
        </div>


    <!-- Población -->
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Población</span>
        <input type="text" class="form-control"class="form-control" type="text" name="pob" value="<?=isset($_POST['pob']) ? $_POST['pob']: ''?>">
    </div>

    Provincia:
<?php
$provincias = [
""=>"",
"21"=>"Huelva",
"41"=>"Sevilla",
"11"=>"Cádiz",
"29"=>"Málaga",
"14"=>"Córdoba",
"18"=>"Granada",
"23"=>"Jaén",
"04"=>"Almería",
"22"=>"Huesca",
"44"=>"Teruel",
"50"=>"Zaragoza",
"33"=>"Asturias",
"07"=>"Baleares",
"35"=>"Las Palmas",
"38"=>"Santa Cruz de Tenerife",
"39"=>"Cantabria",
"05"=>"Avila",
"09"=>"Burgos",
"24"=>"León",
"34"=>"Palencia",
"37"=>"Salamanca",
"40"=>"Segovia",
"42"=>"Soria",
"47"=>"Valladolid",
"49"=>"Zamora",
"02"=>"Albacete",
"13"=>"Ciudad Real",
"16"=>"Cuenca",
"19"=>"Guadalajara",
"45"=>"Toledo",
"08"=>"Barcelona",
"17"=>"Girona",
"25"=>"Lleida",
"43"=>"Tarragona",
"03"=>"Alicante",
"12"=>"Castellón",
"46"=>"Valencia",
"06"=>"Badajoz",
"10"=>"Cáceres",
"15"=>"A Coruña",
"27"=>"Lugo",
"32"=>"Ourense",
"36"=>"Pontevedra",
"28"=>"Madrid",
"30"=>"Murcia",
"31"=>"Navarra",
"01"=>"Álava",
"48"=>"Vizcaya",
"20"=>"Gipuzkoa",
"26"=>"La Rioja",
"51"=>"Ceuta",
"52"=>"Melilla",
];
?>

<select name="provincia">
    <?php foreach($provincias as $value=>$desc) :?>
        <option value="<?=$value?>"
        <?php if (filter_input(INPUT_POST, 'opcion')==$provincias)
        echo 'selected';?>><?=$desc?>
        </option>
    <?php endforeach; ?>
</select>
<br>
    <?=VerError('provincia')?>

    <?=VerError('pob')?>
        <br>
        <!-- Código Postal -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">CP</span>
            <input type="text" class="form-control"class="form-control" type="text" name="cp" value="<?=isset($_POST['cp']) ? $_POST['cp']: ''?>">
             <?=VerError('cp')?>
        </div>

      <p class="form-check">
        <p>ESTADO TAREA:
       <input class="form-check-input" type="radio" name="estadoTarea" value="Esperando a ser aprobada" 
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='Esperando a ser aprobada')
            echo 'checked';
        ?>> Esperando a ser aprobada

       <input class="form-check-input" type="radio" name="estadoTarea" value="Realizada" checked
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='Realizada')
            echo 'checked';
        ?>> Realizada

       <input class="form-check-input" type="radio" name="estadoTarea" value="Cancelada"
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='Cancelada')
            echo 'checked';
        ?>> Cancelada
        <?=VerError('estadoTarea')?>
    </p>

   <p>Fecha creación:
   <input type="date" name="fechaC" readonly value="<?=date('Y-m-d')?>">
   <br>
        <p>Anotaciones anteriores:<br>
        <textarea class="form-control" name="anotA" value="<?=isset($_POST['anotA']) ? $_POST['anotA']: ''?>"> texto que se desee incluir para explicar el trabajo a realizar antes de comenzarlo.
</textarea>
        <p>Operario encargado:
           
<?php
$operarios = [
    "oper1"=>"operario 1",
    "oper2"=>"operario 2",
    "oper3"=>"operario 3",
    "oper4"=>"operario 4",
];

// if ($registro) { ?>
   <select name="operario">
    <?php foreach($operarios as $value=>$desc) :?>
        <option value="<?=$value?>"
        <?php if (filter_input(INPUT_POST, 'opcion')==$operarios)
        echo 'selected';?>><?=$desc?>
        </option>
    <?php endforeach; ?>
</select>
   <!-- <?php // } ?> -->

<p>Fecha realización:
        <input type="date" name="fechaR" value="<?=isset($_POST['fechaR']) ? $_POST['fechaR']: ''?>"> <?=VerError('fechaR')?></p> 
        
        <p>Anotaciones posteriores:<br>
        <textarea class="form-control"  name="anotP" value="<?=isset($_POST['anotP']) ? $_POST['anotP']: ''?>"> Anotaciones realizadas por los operarios después de realizar la tarea.</textarea></p>
        
        
        <!-- permitir adjuntar fichero -->
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">ADJUNTAR FICHERO</label>
             <input type="file" class="form-control" name="fichero" id="inputGroupFile01" value="<?=isset($_POST['fichero']) ? $_POST['fichero']: ''?>">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Fotos del trabajo realizado</label>
            <input type="file" class="form-control" id="inputGroupFile01" name="foto" value="<?=isset($_POST['foto']) ? $_POST['foto']: ''?>" accept=".png, image/png">
        </div>
     
       <input class="btn btn-primary" type="submit" name="enviar" value="ENVIAR">
       <br>
    </form>
    </div>
    </div>
    <?php
include('layout/pie.php'); 
?>
</body>
</html>