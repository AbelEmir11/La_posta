//para el desplazamiento suave al hacer clic en los enlaces del menú
document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        window.scrollTo({
            top: targetElement.offsetTop,
            behavior: 'smooth'
        });
    });
});
//esto de abajo es para hacer la conexion con la base a travez de php
fetch("http://localhost/parcial_practica_profecional/ppp1/interaccion.php")
    .then(response => response.json())
    .then(data => {
        console.log("Productos:", data); // Aquí verás los productos en la consola
        // Puedes usar `data` para mostrar los productos en la web
    })
    .catch(error => console.error("Error:", error));

document.getElementById('contactForm').onsubmit= function(event){
    event.preventDefault();

    this.submit()
};
document.querySelectorAll('.carrusel-item').forEach(item => {
    const image = item.querySelector('.carrusel-imagen');
    const price = item.querySelector('.price');
    const stock = item.querySelector('.stock');
  
    // Almacena los detalles de precio y stock en los atributos de la imagen
    price.textContent = "Precio: " + image.getAttribute('data-precio');
    stock.textContent = "Stock: " + image.getAttribute('data-stock');
  
    // Alternativa para agregar animación al menú si es necesario
    item.addEventListener('mouseover', () => {
      item.querySelector('.product-details').style.opacity = "1";
    });
  
    item.addEventListener('mouseout', () => {
      item.querySelector('.product-details').style.opacity = "0";
    });
  });
  