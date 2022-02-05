<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="/public/img/logo.svg">
            <a href="http://localhost:8080/register">
                <button class="button" style="vertical-align:middle" type="submit"><span>REGISTER </span></button>
            </a>

        </div>
            <div class = "login-container">
                <form action="login" method="POST">
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
                    <button class="button" style="vertical-align:middle" type="submit"><span>LOGIN </span></button>

                </form>
            </div>

        
    </div>
</body>
</html>