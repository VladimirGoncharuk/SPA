<?php

require __DIR__ . '/functions.php';

$login = $_COOKIE['login'] ?? null;

?>
<?php if ($login !== null){
       
        session_start();
        $date_of_birth = $_COOKIE ['date_of_birth']?? $_POST['date_of_birth']??null ; 
        setcookie('date_of_birth',$date_of_birth); 
        $_COOKIE['delet_form']=$date_of_birth;
        $g = ($_COOKIE['TIMEin'] - time()-1);   
        $hPoys  = mktime(date("H",$g) -3 , 0, 0, 0,0,0);
        $h = date("H",$hPoys);
        $i = idate('i', $g);
        $s = idate('s', $g);
        $timeDiscount = "$h ч. $i мин. $s сек.";
        $c= $_COOKIE ['date_of_birth']??null;
        if($c!=null){
        $birth =$_COOKIE ['date_of_birth']; 
        $timebirth = strtotime("$birth");
        /* 2 СПОСОБ ОПРЕДЕЛЕНИЯ др
        if(date('m',$timebirth)===date('m') && date('d',$timebirth)===date('d')){
        $greet ='Поздравляем Вас с праздником и дарим вам скидку 5% на наши услуги';
       }
       */
      
       $timebirth2 = mktime(0, 0, 0, date('m',$timebirth), date('d',$timebirth), date('Y'));
       $timMD = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
       $dbirth = $timebirth2 - $timMD;
        
       if($dbirth>0){
       $remains = $dbirth/86400;
       }elseif($dbirth<0){
        $timebirth2 = mktime(0, 0, 0, date('m',$timebirth), date('d',$timebirth), date('Y')+1);
        $timMD = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $dbirth = $timebirth2 - $timMD;
        $remains = $dbirth/86400;
       }elseif($dbirth===0){
        $greet ='Поздравляем Вас с праздником и дарим вам скидку 5% на наши услуги';
    }
        if(isset($greet)){
        $_SESSION['discount'] = true;
        
        }else{$_SESSION['discount'] = false;}
        }  
           
    ?>
<?php

if(!empty($_POST['password'])){
$login = $_COOKIE['login'] ?? null;
$password =sha1( $_POST['password'] )?? null;

if (checkPassword($login, $password)){
setcookie('password',$password);
header('Location: /mineaccount.php' );
} else{
    $error ='Введен неверный пароль';
}
}
}
?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="style.css" rel="stylesheet">
</head>
<body >
         <header>
     <?php if ($login === null){?>
    <a class="article-meta" href = "login1.php">Авторизация<a>
     <?php } 
     else{?>
     <h1>SPA салон ТАЙНЫ ВОСТОКА  </h1>
     <?php if(isset($_SESSION['discount'])){?> 
    <h2><?=$greet??null;?></h2>  
    <?php } ?>
    <?php if (isset($timeDiscount)){?>
        <h2>До конца персональной скидки осталось <br> <span class="article-meta"><?=$timeDiscount; ?></span></h2>
     <?php } ?> 
     
     </header>            
        
    <div class="form">   
     <?php if(isset($error)){?>
     <span>
     <?= $error ;?>
     </span>
     <?php } ?> 

     
    <h1> Здравствуйте <span class="login"><?= $login ?></span><br>
    <?php 
    $a=$_COOKIE['delet_form']??null;   
    if($a==null){?>
    <form action="index.php" method="post">        
    <label for='date_of_birth'>Введите дату рождения </label><input name="date_of_birth" type ="date" >   
    <input name="submit" type="submit" value="Подтвердить">
    </form>
    <?php } ?>     
    <br>
        <?php if (isset($remains)){?>   
        До вашего дня рождения осталось дней:<span class="login"><?= $remains??null ?></span>  </h1>
     <?php } ?> 

         
     <form action="index.php" method="post">
     <input name="password" type="password" placeholder="Пароль">
     <br>
     <input name="submit" type="submit" value="Войти в личный кабинет">
     </form>    
     <a href = "logout.php">Выйти</a>
    </div> 
     <?php } ?>
        
  
    <section class="menulist">
        <article>
            <a href="#">
                <h2>SPA уходы за телом
                </h2>
            </a>
            <div class="article-meta">
                Уход по лицу с Дамасской Розой<a href="#">/ Подробнее/</a>
                Стоимость <?=$bil=6500;?> <?php if($_SESSION['discount']??null){?><span class="menulist">Ваша цена со скидкой/ <?=$sale= $bil - $bil * 0.05 ;?> </span><?php } ?> Продолжительность 90 минут
                <img src="image/SPA_allbody.png" alt="menulist 1">
                <p> Гоммаж с ароматом дамасской розы глубоко очищает кожу, придает ей упругость и увлажнение, оказывает мощный антицеллюлитный и дренажный эффект.
                    Обертывание маской на основе красной глины мягко тонизирует и питает эпидермис, снимает раздражение, запускает процесс регенерации и оказывает лифтинг-эффект.
                    Завершающий этап ухода — нанесение молочка для тела, который придает коже бархатистость и гладкость.

                 </p>

            </div>   
             
        </article>
        <article>
            <a href="#">
                <h2>SPA уходы комплексные
                </h2>
            </a>
            <div class="article-meta">
                Супер Детокс <a href="#"> /Подробнее/</a>
                 Стоимость <?=$bil=9000;?><?php if($_SESSION['discount']??null){?><span class="menulist"> Ваша цена со скидкой/ <?=$sale= $bil - $bil * 0.05 ;?> </span><?php } ?> . Продолжительность 160 минут
                <img src="image/complex.jpg" alt="menulist  2">
                <p>Насыщенный спа-уход, который очистит ваше тело от шлаков и токсинов, уменьшит отечность, насытит
                   кожу витаминами и минералами, подарит здоровый цвет и сияние коже лица.</p>

            </div>    
        </article>
        <article>
            <a href="#">
                <h2>SPA уходы для двоих
                </h2>
            </a>
            <div class="article-meta">
                Сансара <a href="#"> /Подробнее/</a>
                Стоимость <?=$bil=16500;?><?php if($_SESSION['discount']??null){?><span class="menulist"> Ваша цена со скидкой/ <?=$sale= $bil - $bil * 0.05 ;?> </span><?php } ?> . Продолжительность 210 минут
                <img src="image/forboth.jpeg" alt="menulist">
                <p>Программа включает в себя:

                 Отдых в спа-люксе (индивидуальные хаммам, джакузи, зона отдыха)
                 Скрабирование тела в хаммаме
                 Обертывание тела
                 Релакс-массаж тела
                 Экспресс-уход за лицом
                 Чаепитие
                </p>

            </div>    
        </article>
        <article>
            <a href="#">
                <h2>Массажи тела
                </h2>
            </a>
            <div class="article-meta">
                Классический <a href="#"> Подробнее</a>
                Стоимость <?=$bil=4000;?><?php if($_SESSION['discount']??null){?><span class="menulist"> Ваша цена со скидкой/ <?=$sale= $bil - $bil * 0.05 ;?> </span><?php } ?>  . Продолжительность 60/90 минут
                <img src="image/massage.jpg" alt="menulist 4">
                <p>Классический массаж – метод избавления от усталости, восстановления сил и жизненной энергии.</p>

            </div>    
        </article>
        <article>
            <a href="#">
                <h2>Массажи лица
                </h2>
            </a>
            <div class="article-meta">
                Уход Невесты <a href="#"> Подробнее</a>
                Стоимость <?=$bil=3500;?><?php if($_SESSION['discount']??null){?><span class="menulist"> Ваша цена со скидкой/ <?=$sale= $bil - $bil * 0.05 ;?> </span><?php } ?> . Продолжительность 40 минут
                <img src="image/face.jpg" alt="menulist 5">
                <p>Процедура для лица с медовой маской Gelée Royale поможет напитать, увлажнить и восстановить кожу, придать ей сияние и перламутровый оттенок. Отличный вариант ухода перед важным мероприятием!</p>

            </div>    
        </article>
        <article>
            <a href="#">
                <h2>Аюрведа
                </h2>
            </a>
            <div class="article-meta">
                
             Абхьянга (массаж тела) <a href="#">Подробнее </a>
             Стоимость <?=$bil=3000;?><?php if($_SESSION['discount']??null){?><span class="menulist"> Ваша цена со скидкой/ <?=$sale= $bil - $bil * 0.05 ;?> </span><?php } ?>  . Продолжительность 60 минут
                <img src="image/auverde.jpg" alt="menulist 5">
                <p>Этот индийский ритуал полезен для кожи, волос, опорно-двигательного аппарата, метаболизма и общего самочувствия. </p>

            </div>    
        </article>
                                           
    </section>
    <footer>
        <div class="Links">
            <a href="#">Вакансии</a>
            <a href="#">Контанты</a>
            <a href="#">О нас</a>
            <a href="#">Реклама</a>
        </div>
        <div class="copyright">Copyright &copy Салон SPA
        </div>
    </footer>
</body>
</html>
