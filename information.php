<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information project</title>
</head>
<body>
<form method="post" action="products.php" enctype="multipart/form-data">
<label for="nom">Nom du produit :</label>
    <input type="text" id="nom" name="nom"><br><br>
    
    <label for="description">Description :</label>
    <textarea id="description" name="description"></textarea><br><br>
    
    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix"><br><br>
    
    <label for="image">Image :</label>
    <input type="file"  name="image" accept="image/png, image/jpeg" multiple><br><br>
    
    <input type="submit" value="Ajouter"  name="Ajouter">
</body>
</html>
