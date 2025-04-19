<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Propiedades Premium</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.2rem;
        }
        .properties {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        .property {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .property:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .property-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }
        .property-info {
            padding: 20px;
        }
        .property-title {
            font-size: 1.3rem;
            margin-top: 0;
            color: #2c3e50;
            font-weight: 600;
        }
        .property-price {
            font-weight: bold;
            color: #e74c3c;
            font-size: 1.4rem;
            margin: 12px 0;
        }
        .property-features {
            list-style: none;
            padding: 0;
            margin: 15px 0;
        }
        .property-features li {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        .property-features i {
            margin-right: 10px;
            color: #3498db;
            font-style: normal;
        }
        .property-description {
            color: #7f8c8d;
            font-size: 0.95rem;
            margin: 15px 0;
        }
        .property-contact {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 0.95rem;
            transition: background 0.3s;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }
        .property-contact:hover {
            background: #2980b9;
        }
        .property-tag {
            position: absolute;
            background: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
            margin: 10px;
        }
        .property-header {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Propiedades Exclusivas</h1>
        
        <div class="properties">
            <!-- Propiedad 1 -->
            <div class="property">
                <div class="property-header">
                    <span class="property-tag">Nuevo</span>
                    <img src="https://via.placeholder.com/400x300?text=Penthouse" alt="Penthouse" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Penthouse con Terraza Panorámica</h3>
                    <div class="property-price">$1,250,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 280 m² construidos</li>
                        <li><i>🛏️</i> 3 habitaciones suite</li>
                        <li><i>🚿</i> 3 baños completos</li>
                        <li><i>🌇</i> Vista 360° a la ciudad</li>
                        <li><i>🏊</i> Piscina en terraza</li>
                    </ul>
                    <p class="property-description">Exclusivo penthouse en torre de lujo con amenities premium y seguridad 24/7.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
                </div>
            </div>
            
            <!-- Propiedad 2 -->
            <div class="property">
                <div class="property-header">
                    <img src="https://via.placeholder.com/400x300?text=Casa+Playa" alt="Casa en la playa" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Villa frente al Mar</h3>
                    <div class="property-price">$890,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 220 m² construidos</li>
                        <li><i>🛏️</i> 4 habitaciones</li>
                        <li><i>🚿</i> 3 baños</li>
                        <li><i>🏖️</i> Acceso directo a playa</li>
                        <li><i>🍹</i> Terraza con jacuzzi</li>
                    </ul>
                    <p class="property-description">Disfruta del sonido del mar en esta espectacular villa completamente equipada.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
                </div>
            </div>
            
            <!-- Propiedad 3 -->
            <div class="property">
                <div class="property-header">
                    <span class="property-tag">Oportunidad</span>
                    <img src="https://via.placeholder.com/400x300?text=Casa+Campestre" alt="Casa campestre" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Finca Campestre con Viñedos</h3>
                    <div class="property-price">$1,500,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 350 m² construidos</li>
                        <li><i>🛏️</i> 5 habitaciones</li>
                        <li><i>🚿</i> 4 baños</li>
                        <li><i>🍇</i> 8 hectáreas de viñedos</li>
                        <li><i>🏡</i> Bodega incluida</li>
                    </ul>
                    <p class="property-description">Propiedad productiva con casa principal y cabañas para invitados en valle vitivinícola.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
                </div>
            </div>
            
            <!-- Propiedad 4 -->
            <div class="property">
                <div class="property-header">
                    <img src="https://via.placeholder.com/400x300?text=Loft+Moderno" alt="Loft moderno" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Loft en Distrito de Arte</h3>
                    <div class="property-price">$320,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 110 m² construidos</li>
                        <li><i>🛏️</i> 1 habitación loft</li>
                        <li><i>🚿</i> 1 baño completo</li>
                        <li><i>🎨</i> Zona de galerías</li>
                        <li><i>🏭</i> Estilo industrial</li>
                    </ul>
                    <p class="property-description">Espacio creativo con techos de 5 metros, perfecto para artistas y profesionales.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
                </div>
            </div>
            
            <!-- Propiedad 5 -->
            <div class="property">
                <div class="property-header">
                    <span class="property-tag">Alquiler</span>
                    <img src="https://via.placeholder.com/400x300?text=Oficina+Ejecutiva" alt="Oficina ejecutiva" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Oficina Ejecutiva en Torre Corporativa</h3>
                    <div class="property-price">$4,500/mes</div>
                    <ul class="property-features">
                        <li><i>📏</i> 90 m² construidos</li>
                        <li><i>💼</i> 4 puestos de trabajo</li>
                        <li><i>🚿</i> Baño privado</li>
                        <li><i>🏙️</i> Vista a la ciudad</li>
                        <li><i>☕</i> Sala de juntas</li>
                    </ul>
                    <p class="property-description">Oficina completamente amueblada con acceso a amenities corporativos.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
                </div>
            </div>
            
            <!-- Propiedad 6 -->
            <div class="property">
                <div class="property-header">
                    <img src="https://via.placeholder.com/400x300?text=Casa+Tradicional" alt="Casa tradicional" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Casa Histórica Restaurada</h3>
                    <div class="property-price">$750,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 240 m² construidos</li>
                        <li><i>🛏️</i> 4 habitaciones</li>
                        <li><i>🚿</i> 3 baños</li>
                        <li><i>🏛️</i> Estilo colonial</li>
                        <li><i>🌳</i> Jardín centenario</li>
                    </ul>
                    <p class="property-description">Joy arquitectónica completamente restaurada con modernas comodidades.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
                </div>
            </div>
            
            <!-- Propiedad 7 -->
            <div class="property">
                <div class="property-header">
                    <span class="property-tag">Exclusivo</span>
                    <img src="https://via.placeholder.com/400x300?text=Departamento+Lujo" alt="Departamento de lujo" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Departamento en Residencia VIP</h3>
                    <div class="property-price">$950,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 180 m² construidos</li>
                        <li><i>🛏️</i> 3 habitaciones</li>
                        <li><i>🚿</i> 2.5 baños</li>
                        <li><i>👨‍🍳</i> Cocina gourmet</li>
                        <li><i>🏋️</i> Gimnasio privado</li>
                    </ul>
                    <p class="property-description">Residencia exclusiva con servicios de conserjería y amenities de lujo.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
                </div>
            </div>
            
            <!-- Propiedad 8 -->
            <div class="property">
                <div class="property-header">
                    <img src="https://via.placeholder.com/400x300?text=Cabaña+Montaña" alt="Cabaña en la montaña" class="property-img">
                </div>
                <div class="property-info">
                    <h3 class="property-title">Cabaña Premium en Montaña</h3>
                    <div class="property-price">$420,000</div>
                    <ul class="property-features">
                        <li><i>📏</i> 150 m² construidos</li>
                        <li><i>🛏️</i> 2 habitaciones</li>
                        <li><i>🚿</i> 2 baños</li>
                        <li><i>🔥</i> Chimenea central</li>
                        <li><i>🏔️</i> Vista a las montañas</li>
                    </ul>
                    <p class="property-description">Refugio alpino con acabados de lujo y acceso a estación de ski.</p>
                    <a href="#" class="property-contact">Solicitar Información</a>
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