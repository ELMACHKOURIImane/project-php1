<?php 
 $username = $_POST['username'];
 $password = $_POST['password'];
     $chemin = "C:\BBD\htdocs\project_php/$username";
 if(isset($_POST['submit'])){
     if(is_dir($chemin)){
    $file = fopen("C:\BBD\htdocs\project_php/$username/information1.txt","r");
      while (!feof($file)) {
        $line = fgets($file);
        $line1 = trim($line);  
        // Diviser la ligne en nom d'utilisateur et mot de passe 
        $fields = explode(',', $line1);
        $username_stoke = $fields[0];
        $password_stoke =  $fields[2];
        // Vérifier les informations d'identification de l'utilisateur
        if ($username == $username_stoke  && $password == $password_stoke) {
        // Si les informations d'identification sont valides, démarrez une session PHP pour l'utilisateur
            header("Location: http://localhost/project_php/products.php");
        }
        else{
            echo "Nom d\'utilisateur ou mot de passe invalide";
        }
    }
    fclose($file);
     }
     else{
        echo 'utilisateur non existe';
     }
 }


?>