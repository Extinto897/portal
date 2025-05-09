<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_index.css">
    <script src="https://kit.fontawesome.com/8dd92a9059.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Sobre Nosotros</h1>
    <div class="contenedor">
        <div id="caja1" class="caja">
            <p>En <b>Cimientos & Sueños Bienes Raíces</b>, construimos más que propiedades: edificamos futuros. Somos una empresa dedicada a transformar sueños en realidades tangibles, ofreciendo soluciones integrales en bienes raíces con un enfoque humano y profesional.</p>
        </div>
        
        <div id="caja2" class="caja">
            <p>Nuestra misión es guiar a nuestros clientes en cada paso del camino, desde encontrar el hogar perfecto hasta invertir en proyectos que perduren. Con valores arraigados en la confianza, la calidad y la innovación, nos especializamos en conectar personas con espacios que inspiran y fortalecen sus historias.</p>
        </div>
        
        <div id="caja3" class="caja">
            <p>Respaldados por años de experiencia y un equipo apasionado, en Cimientos y Sueños no solo vendemos propiedades, sino que creamos cimientos sólidos para tus sueños. ¡Bienvenido a un lugar donde tus aspiraciones encuentran hogar!</p>
        </div>
    </div>
    <h1>Bienvenidos</h1>
    <br>
    <div class="Bienvenidos">
        <div class="Bienvenidos_1">
            <img src="Videos/excavadora_izquierda.gif" alt="gif excavadora">
        </div>
        <div class="Bienvenidos_2">
            <video width="320" height="240" controls>
            <source src="Videos/Video_introduccion _centro.mp4" type="video/mp4">
            <source src="Videos/Video_introduccion_centro.ogg" type="video/ogg">
          Your browser does not support the video tag.
          </video>
        </div>
        <div class="Bienvenidos_3">
            <img src="Videos/volquete_derecha.gif"alt="gif volquete">
        </div>
    </div>
    <br>
    <h1>Fotos de nuestras construciones</h1>
    <div class="slider-container">
        <div class="slider">
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Generar rutas de imágenes locales
            const images = [];
            for (let i = 1; i <= 10; i++) {
                images.push(`img/Slider/Slider_${i}.jpg`);
            }
            
            const slider = document.querySelector('.slider');
            let currentSlide = 0;
            
            // Crear slides
            images.forEach((image) => {
                const slide = document.createElement('div');
                slide.className = 'slide';
                slide.innerHTML = `<img src="${image}" alt="Imagen del slider">`;
                slider.appendChild(slide);
            });
            
            // Función para avanzar al siguiente slide
            function nextSlide() {
                currentSlide = (currentSlide + 1) % images.length;
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            }
            
            setInterval(nextSlide, 5000); //autoplay 5 segundos
            
            // Opcional: Pausar al hacer hover
            slider.addEventListener('mouseenter', () => {
                clearInterval(autoplayInterval);
            });
            
            slider.addEventListener('mouseleave', () => {
                autoplayInterval = setInterval(nextSlide, 2000);
            });
        });
    </script>
   <h1>Videos de nuestros interiores</h1>
   <p class="interiores_texto">Transformamos tus espacios en obras de arte, combinando funcionalidad, estilo y creatividad. Nuestro equipo de diseñadores altamente calificados trabaja con pasión y dedicación para crear ambientes únicos que reflejen tu personalidad y necesidades desde modernos y minimalistas hasta clásicos y acogedores, en Cimientos & Sueños hacemos realidad tus proyectos con innovación y calidad. ¡Confía en los expertos y dale vida a tus sueños!.</p>
   <p class="interiores_texto_1"><b>Gracias a Triarc Arquitectura y Realty Booster os enseñamos los interiores</b></p>
   <div class="video-container">

    <div class="video-wrapper">
        <iframe 
            src="https://www.youtube.com/embed/LgP9tOLEEi4?si=7EiY6M2GadH8H_XM" 
            frameborder="0" 
            allowfullscreen>
        </iframe>
        <p class="video-description">Inspírate con nuestros diseños exclusivos</p>
    </div>

    <div class="video-wrapper">
        <iframe 
        src="https://www.youtube.com/embed/JELky3atCbA?si=9ZOYdQke1hovktq2" 
        frameborder="0" 
        allowfullscreen>
    </iframe>
        </video>
        <p class="video-description">Proyectos residenciales a tu medida</p>
    </div>

    <div class="video-wrapper">
        <iframe 
        src="https://www.youtube.com/embed/xr2QlHIwitc?si=EhzAxCVXCiuyjKxy" 
        frameborder="0" 
        allowfullscreen>
    </iframe>
        </video>
        <p class="video-description">Transformamos espacios comerciales</p>
    </div>
</div>
<script type="text/javascript">
  (function(d, t) {
      var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
      v.onload = function() {
        window.voiceflow.chat.load({
          verify: { projectID: '6803a2d33a517d28ef9f0354' },
          url: 'https://general-runtime.voiceflow.com',
          versionID: 'production',
          voice: {
            url: "https://runtime-api.voiceflow.com"
          }
        });
      }
      v.src = "https://cdn.voiceflow.com/widget-next/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
  })(document, 'script');
</script>
</body>
</html>