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
                <a class="nav__items" href="">Contactame hora</a>
                <a class="nav__items" href="logout.php?logout=true">Logout</a>
            </nav>

            <section class="hero__container">
                <div class="hero__texts">
                    <h1 class="hero__title">Bienvenido a HelloWorld</h1>
                    <h2 class="hero__subtitle">Tu mundo de minijuegos donde podras pasartelo como nunca antes</h2>

                    <a href="#" class="hero__cta">Diviertete</a>
                </div>
            </section>
        </div> 
  
    </header>

    <main>

        <section class="gradient">
            
        </section>

        <section class="presentation container">
            <img  class="presentation__picture" src="assets/img/dino.jpg">
            <h2 class="subtitle">Tiko El Dino</h2>
            <p class="presentation__copy">Tiko es el personaje principal de MiniWorld, un dinosaurio saltarin que nos hara saltar con el en el minijuego de JumpDino el mejor juego de nuestra pagina web.</p>
            <a href="#" class="presentation__cta">Jugar ya</a>
        </section>
        
        <section class="about container">
    
            <figure class="about__container-img">
                <img class="about__img" src="assets/img/heroimage.png">
            </figure>

        </section>

        <section class="relleno">
    
        </section>
    </main>

    <footer class="footer">
        <div class="container footer__cont">

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
            <form>
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



