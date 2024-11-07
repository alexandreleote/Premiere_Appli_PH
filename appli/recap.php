<?php
    session_start();
    ob_start();
    $titre = 'Mon panier';
?>

<?php
    /* Get the information if we ordered during the session */
    if(!isset($_SESSION['products']) || empty($_SESSION{'products'})) {
        echo "<p class='bg-secondary-subtle text-center'>Aucun produit en session...</p>";
    }
    else {
        echo "<div class='mt-5 p-5'>", 
            "<table class='table'>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                        "<th>Actions</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $grandTotal = 0;
        $nbProducts = 0;
        /* Getting every products' details that we ordered */
        foreach($_SESSION['products'] as $index => $product) {
            echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='traitement.php?action=down-qtt&id=$index' class='me-1' role='button'><i class='fa-solid fa-minus'></i></a>".$product['qtt']."<a href='traitement.php?action=up-qtt&id=$index' class='ms-1' role='button'><i class='fa-solid fa-plus'></i></a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='traitement.php?action=delete&id=$index' class='btn btn-danger btn-sm' role='button'><i class='fa-solid fa-trash'></i></a></td>",
                    "</tr>";
            $grandTotal += $product['total'];
            $nbProducts += $product['qtt'];
        }
        
        echo "<tr>",
                    "<td colspan=1>Nombre de produits : ".$nbProducts."</td>",
                    "<td colspan=3>Total général : </td>",
                    "<td colspan=2><strong>".number_format($grandTotal, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
            "</tbody>",
        "</table>";
        
        echo "<a href='traitement.php?action=clear' class='btn btn-danger'>Vider le panier</a>";
        
    }

    if(isset($_SESSION['message'])) {
        echo "<div class='mt-2 p-1 rounded bg-secondary-subtle text-center'>".$_SESSION['message']."</div>";
    }
?>

<?php
    $content = ob_get_clean();

    require_once "template.php"; 
?>
