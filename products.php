<style>
    img {
        width: 120px;
        height: 120px;
    }
    .produit{
        border: 2px solid gray;
        width: 130px;
        height: 280px;
        text-align: center;
        display: block;
    }
    .produits{
        display: inline ;
    }
</style>
<?php
echo '  <a href="information.php"><input type="submit" value="ajouter_produit"></a>';
echo '  <a href="delete_prod.php"><input type="submit" value="supprimer_produit"></a>';

function AfficherProd(){
    $username = $_COOKIE['name'];
    $file1 = fopen($username . "/products.txt", "r") or die('No file exist');
    while (!feof($file1)) {
        $line = fgets($file1);
        $produits = explode('|', $line);
        if(isset($produits[0]) && isset($produits[1]) && isset($produits[2]) && isset($produits[3])){
        $nom = $produits[0];
        $description = $produits[1];
        $prix = $produits[2];
        $image_path = $produits[3];
        echo '<div class="produits">';
        echo '<div class="produit">';
        echo "<img src='$image_path' alt='$nom'>";
        echo "<h2>$nom</h2>";
        echo "<p>$description</p>";
        echo "<p>$prix €</p>";
        echo '</div>';
        echo '</div>';
    }
    }
}

function AddProd()
{
    $username = $_COOKIE['name'];
    $nom = $_POST['nom'];
    setcookie('nom', $_POST['nom'], time() + 3600, '/');
    $prix = $_POST['prix'];
    setcookie('prix', $_POST['prix'], time() + 3600, '/');
    $description = $_POST['description'];
    setcookie('description', $_POST['description'], time() + 3600, '/');
    $imageName = $_FILES['image']['name'];
    //$imageTmpName = $_FILES['image']['tmp_name'];
    $imagePath = 'images/' . $imageName;
    setcookie('imagePath',$imagePath , time() + 3600, '/');
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    // Enregistrer les informations du produit dans un fichier texte
    $productData = $nom . '|' . $description . '|' . $prix . '|' . $imagePath . "\n";
    file_put_contents($username . "/products.txt", $productData, FILE_APPEND);

}

if (isset($_POST['Ajouter'])) {
    AddProd();
    AfficherProd();
}
elseif (isset($_POST['delete_prod'])) {
    DelleteProd();
    AfficherProd();
}
else{
    AfficherProd();
}


function DelleteProd()
{
    $username = $_COOKIE["name"];
    $productsFile = fopen($username . "/products.txt", "r");
    $products = array();

    while (!feof($productsFile)) {
        $line = fgets($productsFile) ;
        $line1 = trim($line);
        $product = explode("|", $line1);
        if (isset($product[0]) && isset($product[1]) && isset($product[2])) {
$products[] = array("nom" => $product[0], "description" => $product[1], "prix" => $product[2], "image" => $product[3]);
        }
    }
    fclose($productsFile);
    $nom = $_POST['nom'];
    $newProducts = array();
    foreach ($products as $product) {
        if ($product['nom'] != $nom) {
            $newProducts[] = $product;
        }
    }
    $products = $newProducts;
    // Sauvegarder les données des produits dans un fichier texte
    $productsFile = fopen($username."/products.txt", "w");
    foreach ($products as $product) {
fwrite($productsFile,$product['nom']."|".$product['description']."|".$product['prix']."|".$product['image']."\n");
    }
fclose($productsFile);

}







?>