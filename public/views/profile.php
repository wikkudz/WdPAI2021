<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/friends.css">
    <script src="https://kit.fontawesome.com/5b854a05a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>Mmeal | Friends</title>
</head>


<body>
    <div class="site">
        <header>
            <div class="maintitle">
                <?=$_COOKIE['userName']?>
                <?=$_COOKIE['userSurname']?>
            </div>
            <a href="http://localhost:8080/login">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </header>
        <main>
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
                <img src="public/img/logo.svg">
            </div>
        </nav>
    </div>


</body>
</html>