<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// utf8_encode() fue DEPRECADA en PHP 8.2 y ELIMINADA en PHP 8.4
// En 8.2 → funciona (con aviso de deprecación si E_DEPRECATED está activo)
// En 8.4 → Fatal error: Call to undefined function utf8_encode()

$productos = [
    [
        "nombre" => "Jam\xF3n ib\xE9rico",
        "precio" => 24.5,
        "origen" => "Extremadura",
    ],
    [
        "nombre" => "Aceitunas ma\xF1zanilla",
        "precio" => 3.9,
        "origen" => "Sevilla",
    ],
    [
        "nombre" => "Queso manche\xE4go",
        "precio" => 8.75,
        "origen" => "La Mancha",
    ],
    [
        "nombre" => "Vi\xF1o Rioja a\xF1ejo",
        "precio" => 12.0,
        "origen" => "La Rioja",
    ],
];

// Patrón habitual en código legacy: recibir datos en ISO-8859-1
// y convertirlos a UTF-8 antes de mostrarlos en la web.
$productos = array_map(function ($p) {
    $p["nombre"] = utf8_encode($p["nombre"]); // <-- Aquí rompe en PHP 8.4
    $p["origen"] = utf8_encode($p["origen"]);
    return $p;
}, $productos);

$version = phpversion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo: rompe en PHP 8.4</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 700px;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 12px;
        }

        h1 { color: #333; font-size: 24px; font-weight: 700; }

        .version-badge {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            font-weight: bold;
        }

        .warning-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 14px 18px;
            border-radius: 4px;
            margin-bottom: 28px;
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        .warning-box code {
            background: #f0e68c;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 13px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        thead th {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) { background: #f8f9fa; }
        tbody tr:hover { background: #fce4ec; }

        tbody td {
            padding: 12px 16px;
            color: #444;
            border-bottom: 1px solid #eee;
        }

        .precio { font-weight: 600; color: #e53935; }

        .footer {
            margin-top: 24px;
            font-size: 12px;
            color: #aaa;
            text-align: center;
        }

        .footer code {
            background: #f5f5f5;
            padding: 2px 6px;
            border-radius: 3px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>Catálogo de productos</h1>
            <span class="version-badge">PHP <?= $version ?></span>
        </div>

        <div class="warning-box">
            Esta página usa <code>utf8_encode()</code> para convertir texto de ISO-8859-1 a UTF-8,
            patrón habitual en código legacy.<br>
            <strong>PHP 8.2:</strong> funciona (deprecation notice)&nbsp;&nbsp;
            <strong>PHP 8.4:</strong> Fatal error — función eliminada.
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Origen</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($p["nombre"]) ?></td>
                    <td><?= htmlspecialchars($p["origen"]) ?></td>
                    <td class="precio"><?= number_format(
                        $p["precio"],
                        2,
                    ) ?> €</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="footer">
            Procesado con <code>utf8_encode()</code> · PHP <?= $version ?>
        </div>

    </div>
</body>
</html>
