<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="mt-0">

            <div id="carouselTalleres" class="carousel slide" data-bs-ride="carousel">
              
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselTalleres" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselTalleres" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselTalleres" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
               
                <div class="carousel-inner">
                  
                    <div class="carousel-item active">
                        <img src="img/botones.jpg" class="d-block miImagenCarrusel"
                            alt="Taller de Cerámica para Principiantes">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Miles de botones</h5>
                            <p>Si necesitas un boton esta es tu merceria todo tipo de botones para todo tipo de prendas
                                y manualidades, te ayudamos a elegir!</p>
                        </div>
                    </div>
                   
                    <div class="carousel-item">
                        <img src="img/flecospuntillas.jpg" class="d-block miImagenCarrusel" alt="Taller Avanzado"
                            width="200">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Flecos, puntillas, plisados, etc...</h5>
                            <p>Crea tus trajes regionales, alarga tus prendas o simplemente decora y dale una segunda
                                vida a esa prenda que teanto te gusta.</p>
                        </div>
                    </div>
                   
                    <div class="carousel-item">
                        <img src="img/escaparate lateral.jpg" class="d-block miImagenCarrusel" alt="Taller Infantil"
                            width="200">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Aplicaciones de todo tipo</h5>
                            <p>Repara, decora o create tus propias prendas con una infinita gama de aplicaciones y
                                parches termoadhesivos. Diseña tu propio vestido de fiesta o disfraz</p>
                        </div>
                    </div>
                </div>
              
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselTalleres"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselTalleres"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>

        <section class="seccion2">
            <img src="img/buscar.jpg" class="imgsec4" alt="Buscando" width="300">
            <div class="textosec2">
                <h2>Si algo no lo encuentras, lo buscamos por ti.</h2>
                <p>Tenemos todo en cuanto a materiales de costura se refiere, consumibles y herramientas. Pero si algo
                    no lo tenemos !no te preocupes! haremos
                    todo lo posible por traerte lo que necesitas, solo pregunta por ello.</p>
            </div>
        </section>
        <section class="seccion3">
            <div class="textoSec3">
                <h2 id="solutions">No te lo puedes perder</h2>
                <p>Elige lo que necesitas de forma facil y sencilla</p>
            </div>

            <div class="solutions-container">
                <div class="card" style="width: 18rem;">
                    <img src="img/etiquetas.jpg" class="card-img-top" alt="etiquetas">
                    <div class="card-body">
                        <h5 class="card-title">Etiquetas</h5>
                        <p class="card-text">Encarga tus etiquetas personalizadas, para pegar o coser en la ropa.
                            Ideales tanto para
                            residencias como para campamentos.</p>
                        <a href="productos.php#etiquetas">Etiquetas para ropa -></a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/babero.png" class="card-img-top" alt="Baberos">
                    <div class="card-body">
                        <h5 class="card-title">Baberos</h5>
                        <p class="card-text">Baberos impermeables para bordar de diversos tamaños, tambien especiales
                            para adultos</p>
                        
                        <a href="productos.php#baberos">Baberos -></a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/costurero.png" class="card-img-top" alt="Costureros">
                    <div class="card-body">
                        <h5 class="card-title">Costureros</h5>
                        <p class="card-text">Costureros rijidos, blandos, de viaje, cajas de almacenamiento de hilos,
                            botones, etc</p>
                        <a href="productos.php#costureros">Costureros -></a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/bolso con parches.png" class="card-img-top" alt="Baberos">
                    <div class="card-body">
                        <h5 class="card-title">Parches</h5>
                        <p class="card-text">Rodilleras y parches de todo tipo y tamaño, gran surtido. Aplicaciones para
                            decoracion.</p>
                        <a href="productos.php#parches">Parches y rodilleras -></a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/puntillas.png" class="card-img-top" alt="Puntillas">
                    <div class="card-body">
                        <h5 class="card-title">Puntillas</h5>
                        <p class="card-text">Puntillas de tira bordada, bolillos, guipour, etc una amplia gama de
                            puntillas para tu dia a dia o para tus trajes regionales.</p>
                        <a href="productos.php#puntillas">Puntillas y bordados -></a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/Cintas y Pasamanerias.png" class="card-img-top" alt="Pasamaneria y cintas">
                    <div class="card-body">
                        <h5 class="card-title">Pasamaneria y cintas</h5>
                        <p class="card-text">Gran surtido de pasamanerias y cintas. Bien sea para decorar, tapizar tus
                            muebles o para lo que necesites.</p>
                        <a href="productos.php#pasamaneria">Pasamaneria y cintas -></a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/hilos y cordon.jpg" class="card-img-top" alt="Hilos y cordones">
                    <div class="card-body">
                        <h5 class="card-title">Hilos y cordones</h5>
                        <p class="card-text">Rodilleras y parches de todo tipo y tamaño, gran surtido. Aplicaciones para
                            decoracion.</p>
                        <a href="productos.php#hilos">Hilos y cordones -></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="seccion4">
            <img src="img/botones.jpg" class="card-img-top " alt="Baberos">
            <div class="textosec4">
                <h2>La merceria con mas botones del Norte.</h2>
                <p>Con mas de 40 años de experiencia primero como El 9 y ahora como El Metro. Nuestra variedad y calidad
                    de articulos nos hace estar a la cabeza en la rioja.</p>
                <p>A demas de tener todo lo referente a costura, miles de clientes son testigos de nuestra
                    profesionalidad y excelente atencion al publico</p>
                <p>Si tienes una idea y no sabes como hacerla, nosotros te ayudamos, aconsejamos y mostramos todas las
                    herramientas que tienes a tu disposicion.</p>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>

</body>

</html>