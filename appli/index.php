<?php
    session_start();
    ob_start();
    $titre = 'Commander un produit';
    
?>

<!-- FORM -->
    <div class="bg-white pb-2">
        <div class="d-flex justify-content-center">
                
            <form action="traitement.php?action=add" method="post" enctype="multipart/form-data" class="">
                <div class="">
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
                    <input type="submit" name="submit" value="Ajouter le produit">
                </p>
                </div>  
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <?php
        
                if(isset($_SESSION['message'])) {
                    echo "<div class='pt-2'>".$_SESSION['message']."</div>";
                }
            
            ?>
        </div>
    </div>
    

<?php

    $content = ob_get_clean();

    require_once "template.php"; ?>