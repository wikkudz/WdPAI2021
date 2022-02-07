<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/dish.css">
    <script src="https://kit.fontawesome.com/5b854a05a2.js" crossorigin="anonymous"></script>

    <title>Mmeal | Dish</title>
</head>
<body>
    <header>
        <div class="maintitle">
            <?= $dish -> getTitle() ?>
        </div>

        <div class = "time">
            <?= $dish -> getTime() ?>min
            <i class="far fa-clock"></i>
        </div>

    </header>
    <main>
        <div class="photo">
            <img src = "<?= $dish -> getImage() ?>">
        </div>
        <div class="ingredients">
            <div class="ingredients-title">
                Skladniki
            </div>
            <div class="ingredients-list">
                <?php foreach($ingredients as $ingredient):?>
                <?= $ingredient -> getName() ?>
                (<?= $ingredient -> getWeight() ?>)
                <?= $ingredient -> getPrice() ?>zl
                <br>
                <?php endforeach; ?>
            </div>
            <div class="portions">
                Ilosc porcji: <?= $dish -> getAmount() ?>
            </div>
        </div>
        <div class="description">
            <div class="description-title">
                Sposob przygotowania
            </div>
            <div class="description-main">
                <?=$dish -> getDescription() ?>
            </div>
            <label class="custom-checkbox">
                <input type="checkbox" />
                <i class="far fa-star unchecked"></i>
                <i class="fas fa-star checked"></i>
                ULUBIONE
            </label>
        </div>
    </main>
    <nav>
        <div class= "searchbar">
            <i class="fas fa-search"></i>
            <input class= "search" placeholder="Szukaj...">
            <i class="fas fa-filter"></i>
        </div>

        <div class="icons-bar">
            <i class="fas fa-user-friends"></i>
            <i class="fas fa-user"></i>
            <a href="http://localhost:8080/dishes">
                <img class="mainlogo" src="public/img/logo.svg" href="http://localhost:8080/dishes">
            </a>
        </div>
    </nav>
</body>
</html>