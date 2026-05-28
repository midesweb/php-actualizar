<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Versión PHP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 60px 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .container h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .version-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .version-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .version-number {
            font-size: 48px;
            font-weight: bold;
            font-family: 'Courier New', monospace;
        }

        .info-section {
            text-align: left;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .info-section p {
            color: #555;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .info-section p strong {
            color: #333;
        }

        .info-section p:last-child {
            margin-bottom: 0;
        }

        .demos {
            margin-top: 28px;
        }

        .demos h2 {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            text-align: left;
        }

        .demo-link {
            display: block;
            padding: 14px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: opacity 0.2s;
            text-align: left;
        }

        .demo-link:hover { opacity: 0.85; }

        .demo-link.rojo {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .demo-link.naranja {
            background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
            color: white;
            margin-top: 10px;
        }

        .demo-link .etiqueta {
            font-size: 11px;
            opacity: 0.85;
            display: block;
            margin-top: 3px;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Información del Servidor</h1>
        
        <div class="version-box">
            <div class="version-label">Versión de PHP</div>
            <div class="version-number"><?php echo phpversion(); ?></div>
        </div>

        <div class="info-section">
            <p><strong>Sistema Operativo:</strong> <?php echo php_uname(); ?></p>
            <p><strong>SAPI:</strong> <?php echo php_sapi_name(); ?></p>
            <p><strong>Zona horaria:</strong> <?php echo date_default_timezone_get(); ?></p>
            <p><strong>Hora actual:</strong> <?php echo date('d/m/Y H:i:s'); ?></p>
        </div>

        <div class="demos">
            <h2>Demos</h2>
            <a href="rompe-en-80.php" class="demo-link rojo">
                Código que rompe en PHP 8.0
                <span class="etiqueta">Funciona en 7.x · Fatal error en 8.0+</span>
            </a>
            <a href="deprecate-en-84.php" class="demo-link naranja">
                Código deprecado en PHP 8.4
                <span class="etiqueta">Funciona con warnings en 8.4</span>
            </a>
        </div>

    </div>
</body>
</html>
