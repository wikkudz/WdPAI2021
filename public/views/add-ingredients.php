<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/adddish.css">
    <script src="https://kit.fontawesome.com/5b854a05a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/dish.js" defer></script>
    <title>Mmeal | Add dish</title>

</head>
<body>
<form action = "addIngredient" method="POST" enctype="multipart/form-data" id="add-ingredients-form">
    <?php if(isset($messages)){
        foreach ($messages as $message){
            echo $message;
        }
    }
    ?>
    <header>

        <div class="maintitle">
            Dodawanie skladnikow
        </div>

    </header>
    <main>
        <div class="ingredients">
            <div class="ingredients-title">
                Skladniki
                <button id="ingredients-button" type="button" onclick="addIngredient()"><i class="fas fa-plus" action="on"></i></button>
            </div>
            <div class="ingredients-list">
                <div class = "addingredients">
                    <div class="input-div">

                            <input name="recipe-id" type="text" value = '<?= $dish -> getId() ?>' style="display: none">

                    </div>
                </div>

            </div>
        </div>
    </main>
    <nav>
        <button class="button1" style="vertical-align:middle" type="submit" form="add-ingredients-form"><span> DODAJ&nbsp; </span></button>

        <div class="icons-bar">
            <i class="fas fa-user-friends"></i>
            <i class="fas fa-user"></i>
            <a href="http://localhost:8080/dishes">
                <img class="mainlogo" src="public/img/logo.svg" href="http://localhost:8080/dishes">
            </a>
        </div>
    </nav>
</form>

</body>
</html>