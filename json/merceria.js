// Menú hamburguesa
const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.menu');
hamburger.addEventListener('click', () => {
  menu.classList.toggle('show');
});

// Mostrar sección de registro al hacer clic en el enlace
const registroLink = document.querySelector('a[href="#registrate"]');
const seccionLogin = document.querySelector('.inicSesion');
const seccionRegistro = document.querySelector('.registrate');

registroLink.addEventListener('click', function (e) {
  e.preventDefault();
  seccionLogin.style.display = 'none';
  seccionRegistro.style.display = 'flex';
});

// Botón para volver al formulario de inicio de sesión
const volverLoginLink = document.querySelector('.volver-login');
volverLoginLink.addEventListener('click', function (e) {
  e.preventDefault();
  seccionRegistro.style.display = 'none';
  seccionLogin.style.display = 'flex';
});

// Selecciona el botón que alterna la visibilidad de la contraseña para el inicio sesion
const toggleClave = document.getElementById('toggleClave');
const inputClave = document.getElementById('clave');
toggleClave.addEventListener('click', () => {
  const tipo = inputClave.getAttribute('type') === 'password' ? 'text' : 'password';
  inputClave.setAttribute('type', tipo);
  toggleClave.textContent = tipo === 'password' ? '👁️' : '🙈';
});

const toggleClaveR = document.getElementById('toggleClaveRegistro');
const inputClaveR = document.getElementById('claveRegistro');
toggleClaveR.addEventListener('click', () => {
  const tipo = inputClaveR.getAttribute('type') === 'password' ? 'text' : 'password';
  inputClaveR.setAttribute('type', tipo);
  toggleClaveR.textContent = tipo === 'password' ? '👁️' : '🙈';
});
