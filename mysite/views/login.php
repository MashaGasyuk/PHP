<?php 
    $flag=false;
    if(!empty($_POST)){ 
        $result = $mysqli->query("SELECT * FROM users WHERE login = '$_POST[log]';");
        $user = $result->fetch_assoc();
        if($user && password_verify($_POST["password"],$user["password"])){  
            $_SESSION["user"] = ["id"=>$user["id"], "login"=>$user["login"], "isAdmin"=>$user["admin"]];
            $flag=true;
            header("Location: index.php?action=index");
        }
        if(!$flag){
            ?>
                <div class="error">
                    <p class='errortext'>
                        Невірний пароль або логін. Спробуйте ще раз. 
                    </p>
                </div>
            <?php
        }
    }

?>


<div class="inside5">
    <div class="inside1">
        <h1 class="title">Авторизація</h1>
    </div>
    <div class="inside2">
    <form action="index.php?action=login" method="POST">
        <label class='text'>Логін</label>
        <input class='center' type="text" name="log"><br>
        <br/>
        <label class='text'>Пароль</label>
        <input class='center2' type="password" name="password"><br>
        <br/>
        <input class="btn" type="submit" value="Увійти"/>
        <br/>
        <p>Можливо ви ще не маєте аккаунта?<br>
        </p>
        <button class="btn1"><a href="index.php?action=registration">Зареєструватись</a></button>
        
    </form>
    </div>
</div>