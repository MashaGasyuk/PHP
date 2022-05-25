<nav class="leftmenu">
            <ul class="menu-main1 lefttext">
                <a href="index.php?action=registration">Реєстрація</a>
                <?php

if(!empty($_SESSION["user"]) && !empty($_SESSION["user"]["login"])){
?>
<a href="index.php?action=logout">Вийти</a>
<?php
} 
else{
?>
<a href="index.php?action=login">Увійти</a>
<?php

}?>
            </ul>
         
    </nav>