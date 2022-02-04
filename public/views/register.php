<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="/public/img/logo.svg">
        </div>
            <div class = "register-container">
                <form name="register" action="register" method="POST">
                    <div class="messages">
                        <?php if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>

                    <input name="email" type="text" placeholder = "email">
                    <input name="password" type="password" placeholder = "password">
                    <input name="confirmedPassword" type="password" placeholder = "confirm password">
                    <input name="name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <button class="button" style="vertical-align:middle" type="submit"><span>REGISTER</span></button>
                </form>
            </div>

        
    </div>
</body>
</html>