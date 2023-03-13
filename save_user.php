<?php  
$servername ="localhost";
$username = "root";
$password = "";
$database = "gestion_paquet";

$dsn = "mysql:host=$servername;dbname=$database"; 

$connection = new PDO($dsn , $username , $password);

if (!$connection) {
    die('Erreur de connexion à la base de données : ');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $name = $_POST["name"] ;
 setcookie('name', $_POST['name'], time() + 3600, '/');
 $email = $_POST["email"];
 $password = $_POST["password"];
 mkdir("C:\BBD\htdocs\project_php/$name");
 $file = fopen("C:\BBD\htdocs\project_php/$name/information1.txt","a+");
 $file2 = fopen("C:\BBD\htdocs\project_php/$name/products.txt","a+");
 $DATA= $name.",".$email.",".$password."\n";
 fwrite($file , $DATA );
 fclose($file);

 $sql = "CREATE TABLE product_$name (
    nom varchar(20) not null primary key ,
    description varchar(20) not null ,
    prix int(20) not null ,
    imagePath varchar(50)
 );";

$result = $connection->query($sql);

if(!$result){
    echo "Invalid query";
}

header('Location: form1.php');
}

?>