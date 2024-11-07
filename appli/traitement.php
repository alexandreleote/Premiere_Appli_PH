<?php
    session_start();
    
    /* Default url when we click on an action */
    $url = 'recap.php';
    
    if(isset($_GET['action'])) {

        switch($_GET['action']) {

            case 'add' : // Add an item to the cart

                if(isset($_POST['submit'])) {
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                
                    if($name && $price && $qtt) {
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
                
                        $_SESSION['products'][] = $product;
                        
                        // Success message name of the item and its quantity
                        $_SESSION['message'] = "Le produit ".$name." (qte: <strong>".$qtt."</strong>) a été ajouté !";
                        
                    } else {

                        // Error message when submitting the form with wrong characters
                        $_SESSION['message'] = "Erreur : merci de bien vouloir vérifier  les informations renseignées.";
                    }
                    
                }
                
                
                $url = "index.php"; // Redirection to index.php

            break;

            case 'delete' : // Empty an item
                
                if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                    unset($_SESSION['products'][$_GET['id']]);

                    // Delete message success
                    $_SESSION['message'] = "Le produit ".$_SESSION['products'][$_GET['id']]['name']." a été supprimé !";
                }
                
            break;

            case 'clear' : // Empty the cart
               
                unset($_SESSION['products']);

                // Delete message success
                $_SESSION['message'] = "Le panier a été vidé !";

            break;

            case 'up-qtt' : // Increase the quantity of the targeted item
                
                if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                    $_SESSION['products'][$_GET['id']]['qtt']++ ;
                    
                    // Update the price of the product when increasing or decreasing the item
                    $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];

                }
                
            break;

            case 'down-qtt' : // Decrease the quantity of the targeted item
                
                if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                    $_SESSION['products'][$_GET['id']]['qtt']-- ;
                    
                    $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];
                    
                    /* If item's quanitity reach 0 -> delete it */
                    if($_SESSION['products'][$_GET['id']]['qtt'] == 0) {

                        unset($_SESSION['products'][$_GET['id']]);
                        
                        // Delete message success
                        $_SESSION['message'] = "Le produit ".$_SESSION['products'][$_GET['id']]['name']." a été supprimé !";
                    }
                    
                }
                else $_SESSION['message'] = "Action impossible !";
            break;
        }
        
        header("Location: ".$url); // Redirection to index.php 
        exit; 
    }  