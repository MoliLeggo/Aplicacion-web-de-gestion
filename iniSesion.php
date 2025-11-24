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
        <section class="inicSesion">
            <h2>Inicia Sesion</h2>
            <div class="form-container">
                <form method="POST" action="login.php">
                    <div>
                        <label for="emailLogin">Correo electrónico</label>
                        <input type="email" id="emailLogin" name="email" required
                            placeholder="Ingresa tu correo electrónico">

                        <div class="campo-clave">
                            <label for="claveLogin">Contraseña</label>
                            <div class="input-con-toggle">

                                <input type="password" id="clave" name="clave" required
                                    placeholder="Ingresa tu contraseña" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                                    title="Debe tener al menos 8 caracteres, incluyendo al menos una letra y un número">
                                <button type="button" id="toggleClave" class="toggle-btn">👁️</button>
                            </div>
                        </div>
                        <div class="boton">
                            <button type="submit">Enviar</button>
                        </div>

                        <a href="#registrate" class="ir-registro">¿Aun no estas registrado? Registrate aqui.</a>
                    </div>
                </form>
            </div>
        </section>
        <section class="registrate">
            <h2>Registrate</h2>
            <div class="form-container">
                <form method="POST" action="registro/registro.php">
                    <div>
                        <label for="nombreRegistro">Nombre</label>
                        <input type="text" id="nombreRegistro" name="name" required placeholder="Ingresa tu nombre">

                        <label for="apellidosRegistro">Apellidos</label>
                        <input type="text" id="apellidosRegistro" name="apellidos" required
                            placeholder="Ingresa tus apellidos">

                        <label for="emailRegistro">Correo electrónico</label>
                        <input type="email" id="emailRegistro" name="email" required
                            placeholder="Ingresa tu correo electrónico">

                        <div class="campo-clave">
                            <label for="claveRegistro">Contraseña</label>
                            <div class="input-con-toggle">

                                <input type="password" id="claveRegistro" name="clave" required
                                    placeholder="Ingresa tu contraseña" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                                    title="Debe tener al menos 8 caracteres, incluyendo al menos una letra y un número">
                                <button type="button" id="toggleClaveRegistro" class="toggle-btn">👁️</button>
                            </div>
                        </div>

                        <div class="boton">
                            <button type="submit">Enviar</button>
                        </div>
                        <a href="#inicSesion" class="volver-login">¿Ya tienes cuenta? Inicia sesión aquí.</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>


</body>

</html>