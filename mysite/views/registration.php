<?php 
    if(!empty($_POST)){ 
        $flag = true;
        if(isset($_POST["login"]) && (preg_match("/[!,.@#$%^&*()+=~?`><№;:]/",$_POST["login"]) || strlen($_POST["login"]) < 4)){
        ?>
            <div class='error'>
                <p class='errortext'>Некоректний логін. Логін повинен містити
                не менше 4 символів. Можна використовувати лише латинські та кириличні літери (великі та малі), цифри,
                нижнє підкреслення та дефіс. 
                </p>
            </div>
        <?php
            $flag = false;
        }

        if(isset($_POST["password"]) && (!preg_match("/[A-ZА-Я]/",$_POST["password"]) || !preg_match("/[a-zа-я]/",$_POST["password"]) || !preg_match("/\d/",$_POST["password"]) || strlen($_POST["password"]) < 7)){
        ?>
            <div class='error'>
                <p class='errortext'>Пароль має складатись із малих та великих літер, а також містити цифри.
                    Пароль має містити не менше 7 символів. 
                </p>
            </div>
        <?php
            $flag = false;
        }

        if(isset($_POST["repeatpassword"]) && !($_POST["password"]==$_POST["repeatpassword"])){
        ?>
            <div class='error'>
                <p class='errortext'>
                    Паролі не співпадають
                </p>
            </div>
        <?php
            $flag=false;
        }

        if(isset($_POST["email"]) && !preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$_POST["email"])){
        ?>
            <div class='error'>
                <p class='errortext'>
                    Некоректно введено електронну пошту
                </p>
            </div>
        <?php  
        $flag=false;
        }
        
        if(!isset($_POST["personal_info"]) ){
        ?>
            <div class='error'>
                <p class='errortext'>
                    Розкажіть про себе
                </p>
            </div>
        <?php  
        $flag=false;
        }

        if($flag){
       
            $hash_password = password_hash($_POST["password"],PASSWORD_BCRYPT);
            $query = "INSERT INTO users(login,password,email,personal_info)
                VALUES(".'"'.$_POST["login"].'","'.$hash_password.'","'.$_POST["email"].'","'.$_POST["personal_info"].'");';
            $mysqli->query($query);
            $mysqli->close();
            require_once("./views/registration_successful.php");
            die;
        }
    }
?>
<div>
    <form class="form" action="index.php?action=registration" method="post">
        <label for="name">login</label><br>
        <input class="input" type="login" name="login"><br>
        <label for="email">Email</label><br>
        <input class="input" type="email" name="email"><br>
        <label for="name">Пароль</label><br>
        <input class="input" type="password" placeholder="Пароль" name="password"><br>
        <label for="name">Повторіть пароль</label><br>
        <input class="input" type="password" placeholder="Повторіть Пароль" name="repeatpassword"><br>
        <label for="name">Про себе</label><br>
        <textarea name="personal_info" cols="40" rows="3"></textarea><br>
        <button class="btn" type="submit">Реєстрація</button>
        
    </form>
</div>