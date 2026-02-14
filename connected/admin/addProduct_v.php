<link rel="stylesheet" href="../../styles/style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Ajouter un lien au menu</title>
</head>
<body>
    <div class='flex'>
    <?php require_once(__DIR__.'/../../components/header.php'); ?>
    <main>
<form action='addProduct_c.php?mod=w' method='post'>
    <div>
    <label>Nom Produit</label>
    <input type='text' id='name' name='name' required />
    </div>

    <div>
    <label>Prix</label>
    <input type='number' id='price' name='price' required />
    </div>

    <div>
    <label>Description</label>
    <br>
    <textarea id="desc" name="desc" rows="5" cols="33" placeholder="une tomate rouge bio" required>
    </textarea>
    </div>

    <label>Categories</label>
    <?php
    $tableauCategory = getCategAll();
    echo"<select name='categ' id='categ-select'>";
    echo"<option value=''>--Veuillez choisir une option--</option>";
    for($i=0; $i<count($tableauCategory); $i++){
        echo "<option value='".$tableauCategory[$i][0]."'>".$tableauCategory[$i][1]."</option>";
    }
    echo"</select>";
    ?>
    

    <div>
    <label>En Stock : </label>    
    <input type="radio" id="no" name="instock" value="0" checked />
    <label for="no">non</label>
    <input type="radio" id="ok" name="instock" value="1"/>
    <label for="ok">oui</label>
    </div>

    <div>
    <button type='submit'>Ajouter</button>
    </div>
</form>
</main>
</div>
<?php require_once(__DIR__.'/../../components/footer.php'); ?>
</body>