<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <script src="https://kit.fontawesome.com/5b854a05a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>Mmeal | Main page</title>
</head>
<body>
    <div class="filter">
        <div class="filter-header">Filtry</div>
        <div class="filter-price">
            Cena

        </div>
        <div class="meal-type">typ</div>
        <div class="portions">ilosc porcji</div>
        <div class="ingredients">skladniki</div>
        <div class="filter-button">button</div>
    </div>
    <div class="container2">
        <main>
            <header>
                <div class="maintitle">
                    Przepisy
                </div>
                <a href="http://localhost:8080/addDish"><i class="fas fa-plus"></i></a>


    
            </header>
            <section class="recipes">

                <?php foreach($dishes as $dish): ?>
                <a href="http://localhost:8080/dish?id=<?= $dish -> getId()?>">
                <div id = '<?= $dish -> getId()?>'>
<!--                    <img src="--><?//= $dish -> getImage()?><!--">-->
                    <script type="text/javascript">
                        document.getElementById(<?= $dish -> getId()?>).style.backgroundImage = "url('<?= $dish -> getImage()?>')";
                        document.getElementById(<?= $dish -> getId()?>).style.borderRadius = "2em";
                        document.getElementById(<?= $dish -> getId()?>).style.objectFit = "cover";
                    </script>
                    <div class="reciepe-background">

                        <div class='recipe-title'>
                            <?= $dish -> getTitle()?>
                        </div>
                        <div class="recipe-info">
                            <div class="rate">
                                <div class="rate-number">
                                    4,8
                                </div>
                            </div>
                            <div class='level'>
                                <div class="level-text">POZIOM</div>
                                <div class="difficulty-level"><?= $dish -> getLvl()?></div>

                            </div>
                            <div class = "price">
                                <div class = "price-info">CENA</div>
                                <div class = "price-value">8zl</div>

                            </div>

                            <div class = "time">
                                <?= $dish ->getTime()?>
                                min
                                <i class="far fa-clock"></i>

                            </div>

                            <div class = "user">
                                <?= $dish ->getUser()?>
                                <i class="fas fa-user"></i>
                            </div>

                        </div>
                    </img>


                    </div>
                    </div>

                </a>
                <?php endforeach; ?>
            </section>
        </main>
        <nav>
            <div class= "searchbar">
                <i class="fas fa-search"></i>
                <input class= "search" placeholder="Szukaj...">
                <i class="fas fa-filter"></i>
            </div>
            
            <div class="icons-bar">
                <i class="fas fa-user-friends"></i>
                <a href="http://localhost:8080/profile">
                    <i class="fas fa-user"></i>
                </a>
                <a href="http://localhost:8080/dishes">
                    <img class="mainlogo" src="public/img/logo.svg" href="http://localhost:8080/dishes">
                </a>

            </div>
        </nav>
    </div>
</body>

<template id="dish-template">
    <div class="recipe-template">
        <div class="reciepe-background">
            <div class='recipe-title'>
            </div>
            <div class="recipe-info">
                <div class="rate">
                    <div class="rate-number">
                        4,8
                    </div>
                </div>
                <div class='level'>
                    <div class="level-text">POZIOM</div>
                    <div class="difficulty-level">0</div>

                </div>
                <div class = "price">
                    <div class = "price-info">CENA</div>
                    <div class = "price-value">8zl</div>

                </div>

                <div class = "time">

                    <i class="far fa-clock"></i>
                </div>

                <div class = "user">
                    user
                    <i class="fas fa-user"></i>
                </div>

            </div>
            </img>

        </div>
    </div>
</template>

</html>