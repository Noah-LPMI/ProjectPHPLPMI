<?php
$tableauInfo = getProductInfo();

//ma categ
$categ = $tableauInfo[0][5];
$categlist = getCategAll();
$nomcateg;
for($i=0;$i<count($categlist);$i++){
    if($categlist[$i][0]==$categ){
        $nomcateg = $categlist[$i][1];
    }
}
?>

<link rel="stylesheet" href="../../styles/style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Modifier un Produit</title>
</head>
<body>
    <div class='flex'>
    <?php require_once(__DIR__.'/../../components/header.php'); ?>
    <main>
<form action="updateProduct_c.php?mod=w&idprod=<?= $tableauInfo[0][0]; ?>" method='post'>
    <div>
    <label>Nom Produit</label>
    <input type='text' id='name' name='name' value="<?= $tableauInfo[0][1]; ?>" required />
    </div>

    <div>
    <label>Prix</label>
    <input type='number' id='price' name='price' value="<?= $tableauInfo[0][2]; ?>" required />
    </div>

    <div>
    <label>Description</label>
    <br>
    <textarea id="desc" name="desc" rows="5" cols="33" placeholder="une tomate rouge bio" required>
    <?= $tableauInfo[0][3]; ?>    
    </textarea>
    </div>

    <label>Categories</label>
    <?php
    $tableauCategory = getCategAll();
    echo"<select name='categ' id='categ-select'>";
    echo"<option value=''>--Veuillez choisir une option--</option>";
    for($i=0; $i<count($tableauCategory); $i++){
        if($nomcateg == $tableauCategory[$i][1]){
        echo "<option value='".$tableauCategory[$i][0]."' selected>".$tableauCategory[$i][1]."</option>";
        }else{
        echo "<option value='".$tableauCategory[$i][0]."'>".$tableauCategory[$i][1]."</option>";
        }
    }
    echo"</select>";
    ?>
    

    <div>
    <label>En Stock : </label>
    <?php if($tableauInfo[0][4]==1){
        echo "<input type='radio' id='no' name='instock' value='0'/>
        <label for='no'>non</label> 
        <input type='radio' id='ok' name='instock' value='1' checked/>
        <label for='ok'>oui</label>";   
    }else{
        echo "<input type='radio' id='no' name='instock' value='0'  checked/>
        <label for='no'>non</label> 
        <input type='radio' id='ok' name='instock' value='1'/>
        <label for='ok'>oui</label>"; 
    } 
    ?>
    </div>

    <div>
    <button type='submit'>Modifier</button>
    </div>
</form>
</main>
</div>
<?php require_once(__DIR__.'/../../components/footer.php'); ?>
</body>