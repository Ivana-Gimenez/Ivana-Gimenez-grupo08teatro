<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmación de compra</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: purple; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; border: 1px solid #ddd; }
        .total { font-size: 18px; font-weight: bold; color: purple; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>🎭 Teatro de la Ciudad</h2>
        </div>
        <div class="content">
            <h3>¡Gracias por tu compra, {{ $compra->user->name }}!</h3>
            <p><strong>N° de compra:</strong> #{{ $compra->id }}</p>
            <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($compra->created_at)->format('d/m/Y H:i') }}</p>

            <hr>

            <h4>Detalle de tu compra:</h4>
            <ul>
                @foreach($compra->entradas as $entrada)
                    <li>
                        <strong>{{ $entrada->evento->nombre }}</strong><br>
                        Cantidad: {{ $entrada->cantidad }} x ${{ number_format($entrada->precio_unitario, 0, ',', '.') }}
                    </li>
                @endforeach
            </ul>

            <hr>

            <p class="total">Total: ${{ number_format($compra->total, 0, ',', '.') }}</p>

            <p>¡Disfrutá del evento! Te esperamos.</p>
            <small>Este comprobante es válido como factura. Teatro de la Ciudad.</small>
        </div>
    </div>
</body>
</html>