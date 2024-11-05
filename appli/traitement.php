<?php
    session_start();

    if(isset($_GET['action'])) {

        switch($_GET['action']) {
            case 'add' :
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
                    }
                }
            break;
            case 'delete' :
            break;
            case 'clear' :
            break;
            case 'up-qtt' :
            break;
            case 'down-qtt' :
            break;
        }
    }

    header("Location:index.php"); // Redirection to index.php