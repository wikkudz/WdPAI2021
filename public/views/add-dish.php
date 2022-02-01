<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/adddish.css">
    <script src="https://kit.fontawesome.com/5b854a05a2.js" crossorigin="anonymous"></script>

    <title>Mmeal | Add dish</title>

</head>
<body>
<form action = "addDish" method="POST" enctype="multipart/form-data">
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
            <input type="file" name="file">
            <button class="button2" type="submit"><i class="fas fa-image"></i></button>
        </div>
        <div class="ingredients">
            <div class="ingredients-title">
                Skladniki
            </div>
            <div class="ingredients-list">
                <div class = "addingredients">
                    <i class="fas fa-plus"></i>
                    <input name="newtitle" type="text" placeholder = "WPISZ NAZWE">
                </div>

            </div>
            <div class="portions">
                Ilosc porcji
                <input name="amount" type="number" min="0" max="100" value="1">
            </div>
        </div>
        <div class="description">
            <div class="description-title">
                Sposob przygotowania
            </div>
            <textarea rows="2" cols="20" name="description-text" wrap="hard">

            </textarea>
            <button type="submit" class="addstep"><span>Dodaj krok</span></button>
        </div>
    </main>
    <nav>
        <button class="button1" style="vertical-align:middle" type="submit"><span> DODAJ&nbsp; </span></button>

        <div class="icons-bar">
            <i class="fas fa-user-friends"></i>
            <i class="fas fa-user"></i>
            <img src="public/img/logo.svg">
        </div>
    </nav>
</form>

</body>
</html>