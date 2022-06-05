<?php 
    session_start();

    if(!$_SESSION['id']){
        header('location:login.php');
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta HTML-EQUIP="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta HTTP-EQUIP="EXPIRES">

    <title>MiniWorld</title>

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/index-style.css">
</head>
<body>
    
    <header class="hero">
        <div class="container">
            <nav class="nav">
                <a class="nav__items nav__items--cta" id="btn-opinions" href="#">Opiniones</a>
                <a class="nav__items" href="#footer">Contactame hora</a>
                <a class="nav__items" href="logout.php?logout=true">Logout</a>
            </nav>

            <section class="hero__container">
                <div class="hero__texts">
                    <h1 class="hero__title">Bienvenido a DinoWorld</h1>
                    <h2 class="hero__subtitle">Nuestra pagina web en la que podras pasartelo genial con Dino, <br>¿conseguiras que Dino no muera?</h2>

                    <a href="game.php" class="hero__cta" id="botonjugar">Juega ya</a>
                </div>
            </section>
        </div> 
  
    </header>

    <main>

        <section class="gradient">
            
        </section>

        <section class="info ">
            <div class="info__container">
                <div class="info__left">
                    <div class="containerinfo__img">
                        <img src="assets/img/chromedino.PNG">
                    </div>
                    
                    <h1>El dinosaurio de Google</h1>
                    <p>Chrome Dino surgió de un esfuerzo grupal impulsado por uno de los directores de Google, la idea era hacer un proyecto divertido. Pero en lugar de promocionarlo, lo mantuvieron en secreto con la idea de que fuera un easter egg divertido para que los usuarios lo encuentren y disfruten durante su tiempo libre y sobretodo en esos momentos incomodos en los que te quedas sin conexión a Internet. </p>

                </div>
                <div class="info__right">
                    <div class="containerinfo__img">
                        <img src="assets/img/dinojump.png">
                    </div>
                    <h1>DinoJumo</h1>
                    <p>DinoJump es un nuestro minijuego basado en Chrome dino solo que cambiando algunas cosas, como las texturas, ya no son en blanco y negro, el cielo cambia de color segun va pasando el tiempo y hemos añadido un par de obstaculos para agregarle mas variedad. Por lo demas el juego es exactamente igual que el minijuego de Chrome. </p>
                    <h5>¿Y en que consiste DinoJump?</h5>
                    <p>Consiste simplemente en un dinosaurio que va corriendo por un mapa infinito intentando no chocarse con los obstaculos que se lo van imponiendo a lo largo de su largo trayecto por el desierto </p>
                </div>
            </div>
        </section>


        <section class="video__tutorial ">
            <div class="video__container">
                <div class="tutorial">
                    <h1>Tutorial</h1>
                </div>
                <div class="video">
                    <img src="assets/img/heroimage.png">
                </div>
                <div class="botonTutorial">
                    <a href="game.php">Juega ya</a>
                </div>
            </div>
        </section>
        
    </main>

    <footer class="footer" id="footer">
        <div class="footer__cont">

            <section class="footer__contact">
                <h3 class="footer__title">Contactame</h3>
                <div class="footer__icons">
                    <span class="footer__container-icons">
                        <a class="fa-brands fa-facebook-f footer__icon" href="#"></a>
                    </span>
                    <span class="footer__container-icons">
                        <a class="fa-brands fa-whatsapp footer__icon" href="#"></a>
                    </span>
                    <span class="footer__container-icons">
                        <a class="fa-brands fa-instagram footer__icon" href="#"></a>
                    </span>
                </div>
            </section>

        </div>
    </footer>

    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Opina</h3>
            <h4>Asi nos ayudas a mejorar</h4>
            <form action="index.php" method="POST">
                <div class="container-inputs">
                    <input type="text" name="opiniones" placeholder="Escribenos aqui tu opinion acerca de la web">

                </div>
                <input type="submit" name="btn-submit" class="btn-submit" value="Enviar">
            </form>
        </div>
    </div>

    
    <script src="https://kit.fontawesome.com/4fade3b7b2.js" crossorigin="anonymous"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>



