<?php
    session_start();
    ob_start();
    $titre = 'Mon panier';
?>

<?php
    /* Get the information if we ordered during the session */
    if(!isset($_SESSION['products']) || empty($_SESSION{'products'})) {
        echo "<p>Aucun produit en session...</p>";
    }
    else {
        echo "<table class='table'>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        $nbProducts = 0;
        /* Getting every products' details that we ordered */
        foreach($_SESSION['products'] as $index => $product) {
            echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".htmlspecialchars($product['name'], ENT_QUOTES, "UTF-8")."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "</tr>";
            $totalGeneral += $product['total'];
            $nbProducts += $product['qtt'];
        }
            echo "<tr>",
                        "<td colspan=1>Nombre de produits : ".$nbProducts."</td>",
                        "<td colspan=3>Total général : </td>",
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                "</tbody>",
            "</table>";
    }
?>

<?php
    $content = ob_get_clean();

    require_once "template.php"; 
?>
