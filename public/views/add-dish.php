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
<form action = "addDish" method="POST" enctype="multipart/form-data" id="add-dish-form">
    <?php if(isset($messages)){
        foreach ($messages as $message){
            echo $message;
        }
    }
    ?>
    <header>

        <div class="maintitle">
            Dodawanie przepisu
        </div>

        <div class = "addtitle" style = "display: flex;">
            <i class="fas fa-plus"></i>
            <input name="title" type="text" placeholder = "WPISZ NAZWE">
        </div>

        <div class = "minutes-counter">
            Czas przygotowania
            <input name="time" type="number" min="0" max="100" value="1">
            min
        </div>
    </header>
    <main>
        <div class="photo">
            <button class="button2" type="submit"><i class="fas fa-image"></i></button>
            <input type="file" name="file">
        </div>
        <div class="ingredients">
            <div class="portions">
                Ilosc porcji
                <input name="amount" type="number" min="0" max="100" value="1">
            </div>
        </div>
        <div class="description">
            <div class="description-title">
                Sposob przygotowania
            </div>
            <textarea rows="5" name="description-text">

            </textarea>
            <div class="difficulty-lvl">
                Poziom trudnosci
<!--                <input list="difficulty" name="level">-->
                <select id="difficulty" name="level">
                    <option value="Latwy">Latwy</option>
                    <option value="Sredni">Sredni</option>
                    <option value="Trudny">Trudny</option>
                </select>
            </div>

        </div>
    </main>
    <nav>
        <button class="button1" style="vertical-align:middle" type="submit" form="add-dish-form"><span> DODAJ&nbsp; </span></button>

        <div class="icons-bar">
            <i class="fas fa-user-friends"></i>
            <i class="fas fa-user"></i>
            <img src="public/img/logo.svg">
        </div>
    </nav>
</form>

</body>
</html>