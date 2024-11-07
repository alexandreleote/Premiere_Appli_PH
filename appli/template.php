<?php
    require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon@1.5.0/font/bootstrap-icons.css">

    <title><?= $titre ?></title>
</head>
<body>
    <div id="wrapper" class="p-5 bg-dark bg-opacity-10 min-vw-100 min-vh-100">
        <!-- NAVBAR -->
        <nav class="navbar justify-content-center bg-dark bg-opacity-10 shadow-sm" data-bs-theme="dark">
            <div class="d-flex align-items-center gap-4">
                <a href="index.php" class="nav-link rounded">Commander</a>
                <a href="recap.php" class="nav-link d-flex align-items-center gap-2">Panier<div class="btn btn-success" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .45rem; --bs-btn-font-size: .65rem;"><?= getWholeQuantity() ?></div></a>
            </div>
        </nav>
        <!-- CONTENT WE RETRIEVE FROM THE PAGE BROWSED -->
        <?= $content ?>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>