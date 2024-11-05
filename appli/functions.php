<?php

    /* Getting the quantity of all items in the cart */
    function getWholeQuantity() {
        $wholeQtt = 0;
        if(isset($_SESSION['products'])) {
            foreach($_SESSION['products'] as $product) {
                $wholeQtt += $product['qtt'];
            }
        }
        return $wholeQtt;
    }

?>