<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!--insert menu ob admin page-->
    <?php require_once ("./views/menu.php") ?>
    <div class="container">
        
        <h1 class="text-center border-dark bg-light m-2 p-2"><?= $title ?></h1>

        <!--gestion session error # color & message from clientController-->
        <?php if(!empty($_SESSION['alert'])) : ?>
            <div class="alert <?= $_SESSION['alert']['type'] ?> text-center" role="alert">
                    <?= $_SESSION['alert']['message'] ?>
            </div>
        <?php 
        // <!--delete alert message-->

            unset($_SESSION['alert']);
        
        endif; ?>
        <?= $content ?>
    </div>
    <!--insert $content-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
</script>
</body>
</html>