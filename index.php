<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="assets/css/style.css">
    </h ead>

<body>
    <div class="header">
        <div class="container">
            <div class="header-line">
                <div class="header-logo">
                    <img src="/assets/images/heaader-logo.png" alt="">
                </div>
                <div class="header-textlogo">
                    <a href="index.php">
                        Shikofy
                    </a>
                </div>

                <div class="nav">
                    <a class="nav-item" href="/catalog.php">Каталог</a>
                    <a class="nav-item" href="/users.php">Пользователи</a>
                    <a class="nav-item" href="/profile.php">Мой профиль</a>
                </div>

                <div class="button-header"><a href="/login.php">Вход/Регистрация</a></div>
            </div>
        </div>
    </div>

    <div class="big-banner1">
        <div class="banner1-text">
            <div class="bn1-title-text">Добро пожаловать <br> на Shikofy</div>
            <div class="bn1-subtext">Здесь каждый может слушать, делиться и <br>чувствовать музыку по-настоящему. <br>
                Загружай свои треки, находи новых <br> исполнителей и будь частью комьюнити <br> где громкость — это
                образ
                жизни.
            </div>
            <div class="bn1-button"><a href="/register.php"><b>Зарегистрироваться</b></a></div>
        </div>
        <div class="banner1-img"></div>
    </div>

    <div class="cards">
        <div class="container">
            <div class="card-holder">
                <div class="card" id="card1">
                    <div class="card-text">Найди все что хочешь
                        <div class="card-button">
                            <div class="card-bt-img1"></div>
                            <div class="buttonA"><a href="@">Перейти</a></div>
                        </div>
                    </div>
                    <div class="card_image1"></div>
                </div>
                <div class="card" id="card2">
                    <div class="card-text">Делись своим творчеством
                        <div class="card-button">
                            <div class="card-bt-img2"></div>
                            <div class="buttonA"><a href="@">Перейти</a></div>
                        </div>
                    </div>
                    <div class="card_image2"></div>
                </div>
                <div class="card" id="card3">
                    <div class="card-text">Оценивай и вдохновляй
                        <div class="card-button">
                            <div class="card-bt-img3"></div>
                            <div class="buttonA"><a href="@">Перейти</a></div>
                        </div>
                    </div>
                    <div class="card_image3"></div>
                </div>
                <div class="card" id="card4">
                    <div class="card-text">Создай профиль музыканта
                        <div class="card-button">
                            <div class="card-bt-img4"></div>
                            <div class="buttonA"><a href="@">Перейти</a></div>
                        </div>
                    </div>
                    <div class="card_image4"></div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-top">
            <div class="footer-left">
                <div class="footer-logo-block">
                    <img src="/assets/images/heaader-logo.png" class="footer-logo">
                    <span class="footer-logo-text">Shikofy</span>
                </div>

                <div class="contact-badge">Наши контакты:</div>

                <p class="footer-text">Email: info@positivus.com</p>
                <p class="footer-text">Phone: 999-999-9999</p>
                <p class="footer-text">Address: 1234 Main St<br>
                    Moonstone City, Stardust State 12345</p>
            </div>

            <div class="footer-subscribe-box">
                <input type="email" placeholder="Email" class="footer-input">
                <button class="footer-btn">Подписаться на новости</button>
            </div>
        </div>

        <div class="footer-divider"></div>

        <div class="footer-bottom">
            <span>© 2023 Shikofy. All Rights Reserved.</span>
            <a href="#" class="footer-policy">Privacy Policy</a>
        </div>
    </footer>
</body>

</html>