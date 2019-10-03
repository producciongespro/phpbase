<?PHP
    //Se invoca el archivo php que tiene las funciones de conexion y desconexion a la base de datos
    require 'conectar.php';
    //Se crea una variable en la que se guardarán los nombres de los campos
    $lista_campos = "";
    //Se crea una variable en la que se guardarán los nombres de las variables
    $lista_valores  = "";
  //Se crea arreglo para almacenar posibles errores
    $errors = array();
    //Se crea una variable en la que se guarda mensaje en caso se que sea exitosa la inserción
    $mjs = "";

//Creación de la primera parte de la consulta que inserta los valores en la tabla, la cual ingresa vía POST
$comando = "insert into ".$_GET['tabla_destino']." (";
//Ciclo para crear las variables de PHP y los correspondientes nombres de los campos (deben llamarse igual en la tabla creada)
foreach ($_POST as $campo => $valor){
    //Se agrega un string con los nombres de los campos de la tabla donde se insertarán los datos
     $lista_campos .= "$campo,";
     //Se agrega un string con los nombres de las variables separadas por coma para que funcione INTO
     $lista_valores  .= "'$valor',";
}
$lista_campos = substr($lista_campos,0,-1);// Elimina la última coma
$lista_valores = substr($lista_valores,0,-1);// Elimina la última coma
//Completa la consulta con los datos de los campos y las variables (VALUES)
$comando .= $lista_campos.") values (".$lista_valores.")";
//Se carga en una variable la conexión a la base de datos
$mysqli = conectarDB();
//Se ejecuta la consulta usando la conexión y el comando creado
$registro = mysqli_query($mysqli,$comando) or die ("Problemas al insertar registro".mysqli_error($mysqli));
//Se evalúa si hubo al menos una inserción
if($registro > 0 )
{
    //En caso de que haya habido al menos una inserción se guarda un mensaje en la variable $msj
    $mjs="Registro exitoso";
    //Se devuelve mensajes al cliente indicando que fue exitoso el registro
    echo json_encode(array('error'=>false, 'mensaje'=>$mjs));
    exit;

    } else {
        //Se guarda un mensaje de error en el array de los errores
        $errors[] = "Error al registrar";
        //Se devuelve mensaje al cliente indicando que no fue exitoso el registro
        echo json_encode(array('error'=>true, 'mensaje'=>$errors ));
    } 
?>
