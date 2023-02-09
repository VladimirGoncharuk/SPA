<?php
session_start();
$login = $_COOKIE['login'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link href="style.css" rel="stylesheet">
</head>
<body >
     <header>
     <?php if ($login === null){?>
    <a class="article-meta" href = "index.php">Авторизация<a>
     <?php } 
     else{?>
     <h1>SPA салон ТАЙНЫ ВОСТОКА  </h1>
     <br>
     <h1>Это ваш личный кабинет <span class="login"><?= $login ?>  </h1>
     
     </header>            
        
     <div class="form">   
    <h1>Для вас доступны следующие специальные предложения </h1><br>
    <a href = "logoutpersonalAccount.php">Выйти<a>
    </div> 
     
    <section class="menulist">
        <article>
            <a href="#">
                <h2>SPA уходы за телом
                </h2>
            </a>
            <div class="article-meta">
                Комплексный массаж<a href="#">/ Подробнее/</a>
                Стоимость 4500 Продолжительность 80 минут
                <img src="image/accunt1.jpeg" alt="menulist 1">
                <p> Комплексный массаж - способствует оздоровлению организма, избавляет от усталости и восстанавливает силы.
                </p>
            </div>      
        </article>
        <article>
            <a href="#">
                <h2>SPA уходы за ногами
                </h2>
            </a>
            <div class="article-meta">
            Испанский лимфодренажный<a href="#">/ Подробнее/</a>
                Стоимость 1500 Продолжительность 30 минут
                <img src="image/account2.jpg" alt="menulist 1">
                <p> После сеанса испанского лимфодренажного массажа происходит глубокое расслабление мышц и улучшение обменных процессов, ускоряется ток лимфы. За счет этого цвет кожи приобретает здоровый ровный оттенок, выводятся шлаки и токсины.</p>
            </div>      
        </article>
        <article>
            <a href="#">
                <h2>SPA уходы за телом
                </h2>
            </a>
            <div class="article-meta">
                Ломи-Ломи<a href="#">/ Подробнее/</a>
                Стоимость 4500 Продолжительность 80 минут
                <img src="image/account3.jpg" alt="menulist 1">
                <p>Во время сеанса массажист задействует бОльшую часть своего тела: помимо пальцев и ладоней в ход идут предплечья и локти. После процедуры вас настигнет чувство полной безмятежности и умиротворения. Помимо значения для души, сеансы Ломи-Ломи помогут избавиться и от множества телесных недугов.
                </p>
            </div>      
        </article>
        <article>
            <a href="#">
                <h2>SPA уходы за телом
                </h2>
            </a>
            <div class="article-meta">
            Антицеллюлитный массаж<a href="#">/ Подробнее/</a>
                Стоимость 1500 Продолжительность 30 минут
                <img src="image/account5.jpg" alt="menulist 1">
                <p> Его действие направлено на усиление кровоснабжения и лимфотока в проблемных зонах, снятие отечности и уменьшение жировых отложений. А так же на улучшение тонуса и эластичности кожи.
                </p>
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
    <?php } ?>
</body>
</html>




 
  
