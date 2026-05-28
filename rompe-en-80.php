<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// each() fue DEPRECADA en PHP 7.2 y ELIMINADA en PHP 8.0
// PHP 7.4 → funciona (con aviso de deprecación)
// PHP 8.0+ → Fatal error: Call to undefined function each()

$configuracion = [
    "host" => "db.miservidor.local",
    "puerto" => "3306",
    "nombre_bd" => "tienda_online",
    "charset" => "utf8mb4",
    "timeout" => "30",
    "zona_hora" => "Europe/Madrid",
];

// Patrón clásico de iteración pre-PHP 7.2:
// recorrer un array asociativo con each() + list()
reset($configuracion);
$items = [];
while ([$clave, $valor] = each($configuracion)) {
    $items[] = ["clave" => $clave, "valor" => $valor];
}

$version = phpversion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo: rompe en PHP 8.0</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
            max-width: 680px;
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
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
            margin-bottom: 28px;
        }

        thead th {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) { background: #f8f9fa; }
        tbody tr:hover { background: #e3f6fd; }

        tbody td {
            padding: 12px 16px;
            color: #444;
            border-bottom: 1px solid #eee;
        }

        .clave {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            color: #0077aa;
            font-weight: 600;
        }

        .valor {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            color: #333;
        }

        .section-title {
            font-size: 13px;
            font-weight: 600;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .code-block {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 16px 20px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 13px;
            line-height: 1.7;
            overflow-x: auto;
        }

        .code-block .fn      { color: #dcdcaa; }
        .code-block .kw      { color: #569cd6; }
        .code-block .str     { color: #ce9178; }
        .code-block .comment { color: #6a9955; }
        .code-block .var     { color: #9cdcfe; }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>Configuración del servidor</h1>
            <span class="version-badge">PHP <?= $version ?></span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td class="clave"><?= htmlspecialchars(
                        $item["clave"],
                    ) ?></td>
                    <td class="valor"><?= htmlspecialchars(
                        $item["valor"],
                    ) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p class="section-title">El código que rompe en PHP 8.0</p>
        <div class="code-block">
<span class="fn">reset</span>(<span class="var">$configuracion</span>);<br>
<br>
<span class="kw">while</span> (<span class="fn">list</span>(<span class="var">$clave</span>, <span class="var">$valor</span>) = <span class="fn">each</span>(<span class="var">$configuracion</span>)) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// procesar cada par clave → valor</span><br>
}<br>
<br>
<span class="comment">// PHP 7.4 → funciona (deprecated notice)</span><br>
<span class="comment">// PHP 8.0 → Fatal error: Call to undefined function each()</span>
        </div>

    </div>
</body>
</html>
