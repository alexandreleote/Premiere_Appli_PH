<?php
    session_start();
    ob_start();
    $titre = 'Commander un produit';
?>

<!-- FORM -->

<div class="d-flex flex-column w-75 flex-grow-1">
    <div class="d-flex justify-content-center flex-column flex-wrap ml-5 mr-5 mb-5">
            
        <form action="traitement.php?action=add" method="post" enctype="multipart/form-data" class="d-flex">
            <div class="p-2">
            <h1 class="text-center text-info display-2 user-select-none"><u>Ajouter un produit</u></h1> 
               
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price" min="0.01">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" min="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
            </div>  
        </form>
    </div>
</div>

<?php

    $content = ob_get_clean();

    require_once "template.php"; ?>