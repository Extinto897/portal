<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .properties {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .property {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .property:hover {
            transform: translateY(-5px);
        }
        .property-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .property-info {
            padding: 15px;
        }
        .property-title {
            font-size: 1.2rem;
            margin-top: 0;
            color: #2c3e50;
        }
        .property-price {
            font-weight: bold;
            color: #e74c3c;
            font-size: 1.3rem;
            margin: 10px 0;
        }
        .property-features {
            list-style: none;
            padding: 0;
            margin: 15px 0;
        }
        .property-features li {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }
        .property-features i {
            margin-right: 8px;
            color: #3498db;
        }
        .property-description {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        .property-contact {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 0.9rem;
        }
        .property-contact:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Propiedades Disponibles</h1>
        
        <div class="properties">
            <!-- Propiedad 1 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Casa+1" alt="Casa moderna" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Casa Moderna en Zona Residencial</h3>
                    <div class="property-price">$350,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 180 m² construidos</li>
                        <li><i>🛏️</i> 3 habitaciones</li>
                        <li><i>🚿</i> 2 baños</li>
                        <li><i>🚗</i> Garaje para 2 autos</li>
                        <li><i>🏡</i> Jardín privado</li>
                    </ul>
                    <p class="property-description">Hermosa casa con acabados de lujo, cocina integral y amplios espacios.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
            
            <!-- Propiedad 2 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Departamento" alt="Departamento" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Departamento en Zona Céntrica</h3>
                    <div class="property-price">$220,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 95 m² construidos</li>
                        <li><i>🛏️</i> 2 habitaciones</li>
                        <li><i>🚿</i> 1 baño</li>
                        <li><i>🏊</i> Piscina comunal</li>
                        <li><i>🏢</i> Área de lavandería</li>
                    </ul>
                    <p class="property-description">Departamento completamente amueblado, ideal para profesionales.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
            
            <!-- Propiedad 3 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Casa+Campo" alt="Casa de campo" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Casa de Campo con Vista al Lago</h3>
                    <div class="property-price">$480,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 250 m² construidos</li>
                        <li><i>🛏️</i> 4 habitaciones</li>
                        <li><i>🚿</i> 3 baños</li>
                        <li><i>🌳</i> 5,000 m² de terreno</li>
                        <li><i>🔥</i> Chimenea</li>
                    </ul>
                    <p class="property-description">Refugio perfecto para disfrutar de la naturaleza con todas las comodidades.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
            
            <!-- Propiedad 4 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Oficina" alt="Oficina" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Oficina en Distrito Financiero</h3>
                    <div class="property-price">$180,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 80 m² construidos</li>
                        <li><i>💼</i> 2 salas de reuniones</li>
                        <li><i>🚿</i> 1 baño</li>
                        <li><i>☕</i> Área de cafetería</li>
                        <li><i>🅿️</i> Estacionamiento incluido</li>
                    </ul>
                    <p class="property-description">Espacio profesional listo para mudarse, con excelente ubicación.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
            
            <!-- Propiedad 5 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Local" alt="Local comercial" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Local Comercial en Zona Transitada</h3>
                    <div class="property-price">$310,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 120 m² construidos</li>
                        <li><i>🪟</i> Vidrieras amplias</li>
                        <li><i>🚿</i> 1 baño</li>
                        <li><i>🔌</i> Instalaciones eléctricas reforzadas</li>
                        <li><i>🏢</i> Segundo piso disponible</li>
                    </ul>
                    <p class="property-description">Ideal para negocio propio, excelente flujo de personas.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
            
            <!-- Propiedad 6 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Duplex" alt="Dúplex" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Dúplex Familiar</h3>
                    <div class="property-price">$275,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 150 m² construidos</li>
                        <li><i>🛏️</i> 3 habitaciones</li>
                        <li><i>🚿</i> 2.5 baños</li>
                        <li><i>🧺</i> Cuarto de lavado</li>
                        <li><i>🌞</i> Terraza privada</li>
                    </ul>
                    <p class="property-description">Vivienda en condominio con áreas verdes y seguridad 24/7.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
            
            <!-- Propiedad 7 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Loft" alt="Loft" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Loft Industrial</h3>
                    <div class="property-price">$195,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 70 m² construidos</li>
                        <li><i>🛏️</i> 1 habitación</li>
                        <li><i>🚿</i> 1 baño</li>
                        <li><i>🏭</i> Estilo industrial</li>
                        <li><i>📶</i> Internet fibra óptica</li>
                    </ul>
                    <p class="property-description">Espacio minimalista con techos altos y mucha luz natural.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
            
            <!-- Propiedad 8 -->
            <div class="property">
                <img src="https://via.placeholder.com/400x300?text=Villa" alt="Villa" class="property-img">
                <div class="property-info">
                    <h3 class="property-title">Villa de Lujo con Piscina</h3>
                    <div class="property-price">$650,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 320 m² construidos</li>
                        <li><i>🛏️</i> 5 habitaciones</li>
                        <li><i>🚿</i> 4 baños</li>
                        <li><i>🏊</i> Piscina climatizada</li>
                        <li><i>🍳</i> Cocina gourmet</li>
                    </ul>
                    <p class="property-description">Residencia exclusiva con diseño arquitectónico premium y vistas panorámicas.</p>
                    <a href="#" class="property-contact">Contactar</a>
                </div>
            </div>
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