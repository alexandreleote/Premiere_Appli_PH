<?php
    session_start();
    ob_start();
    $titre = 'Commander un produit';
    
?>

<!-- FORM -->
    <div class="mt-5">
        <div class="d-flex justify-content-center">
                
            <form action="traitement.php?action=add" method="post" enctype="multipart/form-data" class="p-5 bg-secondary-subtle rounded">
                <div style="background-image: url(https://www.pexels.com/fr-fr/photo/parquet-en-bois-brun-129731/);">
                <h1 class="text-center text-secondary-emphasis"><u>Ajouter un produit</u></h1> 
                
                <p>
                    <label class='d-flex justify-content-between gap-1'>
                        Nom du produit :
                        <input type="text" name="name">
                    </label>
                </p>
                <p>
                    <label class='d-flex justify-content-between gap-1'>
                        Prix du produit :
                        <input type="number" step="any" name="price" min="0.01">
                    </label>
                </p>
                <p>
                    <label class='d-flex justify-content-between gap-1'>
                        Quantité désirée :
                        <input type="number" name="qtt" value="1" min="1">
                    </label>
                </p>
                <p class='d-flex justify-content-center'>
                    <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-success">
                </p>
                </div>  
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <?php
        
                if(isset($_SESSION['message'])) {
                    echo "<div class='mt-2 p-1 rounded bg-secondary-subtle text-center'>".$_SESSION['message']."</div>";
                }
            
            ?>
        </div>
    </div>
    
    <?php

$content = ob_get_clean();

require_once "template.php"; ?>