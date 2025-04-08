<!DOCTYPE html>
<html lang="es">
    <head>
        <metat charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>

        <style>
            body {
                margin: 0;
                /* Reservar espacio para el footer */
                padding-bottom: 30px;
            }
            /* Contenedor general para todo el PDF */
            .pdf-container {
                width: 100%;
                margin: 0 auto;
            }
            /* Estilos para la tabla del encabezado */
            .header-table {
                width: 100%;
                border-collapse: collapse;
            }
            .header-table td {
                vertical-align: middle;
            }

            .signs-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 12px;
            }
            .signs-table td {
                vertical-align: middle;
                padding: 5px;
            }

            /* Footer fijo en la parte inferior */
            .footer {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 20px;
                text-align: center;
                font-size: 10px;
                color: #000000;
            }
            /* Utilizar counter() para mostrar la numeración */
            .footer:after {
                display: block;
                content: "Página " counter(page);
            }
    </style>

    </head>
    <body>
        <div class="pdf-container">
            <!-- Encabezado usando tabla: -->
            <table class="header-table">
                <tr>
                    <!-- Celda 1: Logo de UAEH (ocupa aproximadamente 25% del ancho) -->
                    <td style="width:20%; text-align:left; vertical-align: top;">
                        <img src="{{ asset('storage/uaehLogo.png') }}" alt="Logo UAEH" style="width:150px;">
                    </td>
                    <!-- Celda 2: Título (ocupa aproximadamente 50% del ancho) -->
                    <td style="width:55%; text-align:center; vertical-align: bottom;">
                        <p class="mb-0" style="margin-top: 20px;">UNIVERSIDAD AUTÓNOMA DEL ESTADO DE HIDALGO</p>
                        <p class="mb-0">CENTRO DE CÓMPUTO ACADÉMICO</p>
                        <p class="mb-0">AV. UNIVERSIDAD S/N COL. SANTIAGO JALTEPEC</p>
                        <p class="mb-0">ÁREA DE MANTENIMIENTO DE EQUIPO DE CÓMPUTO</p>
                    </td>
                    <!-- Celda 3: Logo de Ceca (ocupa aproximadamente 25% del ancho) -->
                    <td style="width:20%; text-align:right; vertical-align: top;">
                        <img src="{{ asset('storage/cecaLogo.png') }}" alt="Logo Ceca" style="width:130px;">
                    </td>
                </tr>
            </table>

            <hr>

            <!-- Información de la orden -->
            <div class="" style="font-size: 14px;">
                <strong>Número de Orden:</strong> {{ $order->order_number }}<br>
                <strong>Fecha de Generación:</strong> {{ $order->date_generation ? date('d/m/Y', strtotime($order->date_generation)) : date('d-m-Y') }}<br>
                <strong>Fecha de Entrega:</strong> {{ $order->date_reception ? date('d/m/Y', strtotime($order->date_reception)) : 'Sin fecha' }}<br>
                <strong>Área Académica:</strong> {{ $order->cgAcademicArea ? $order->cgAcademicArea->area_name : 'Sin Área Académica'}}<br>
                <strong>Dependencia:</strong> {{ $order->cgDependency ? $order->cgDependency->dependency_name : 'N/A' }}<br>
                <strong>Fecha de impresión:</strong>
                {{ now()->setTimezone('America/Mexico_City')->format('d/m/Y H:i') }}
            </div>

            <hr>

            <!-- Detalle de dispositivos -->
            <strong class="">Dispositivos Asociados</strong>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Núm. Serie</th>
                        <th>Falla</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devices as $device)
                        <tr>
                            <td>{{ $device->cgKindObject ? device->cgKindObject->object : 'Sin tipo de dispositivo' }}</td>
                            <td>{{ $device->cgBrand ? $device->cgBrand->brand_name : 'Sin marca' }}</td>
                            <td>{{ $device->model }}</td>
                            <td>{{ $device->cgKindFailure ? $device->cgKindFailure->failure : 'Sin tipo de falla' }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>
            <h1>hola</h1>

            <hr>

            <table class="signs-table">
                <!-- Primera fila con los títulos -->
                <tr>
                    <td style="width:33%; text-align:center">
                        Área de Mtto. de Eq. de Cómp.
                    </td>
                    <td style="width:33%; text-align:center">
                        Administración
                    </td>
                    <td style="width:33%; text-align:center">
                        Conformidad
                    </td>
                </tr>
                <!-- Segunda fila para la firma -->
                <tr>
                    <td style="width:33%; text-align:center;">
                        <div style="border-top: 1.5px solid #000; margin: 30px auto 0; width:70%;">Sistema de mantenimiento</div>
                    </td>
                    <td style="width:33%; text-align:center;">
                        <div style="border-top: 1.5px solid #000; margin: 30px auto 0; width:70%;">&nbsp;</div>
                    </td>
                    <td style="width:33%; text-align:center;">
                        <div style="border-top: 1.5px solid #000; margin: 30px auto 0; width:70%;">{{ $order->client_delivered }}</div>
                    </td>
                </tr>
                <td style="width:33%; text-align:center;">
                </td>
                <td style="width:33%; text-align:center; padding-top: 20px;">
                    Firma de recepción
                </td>
                <td style="width:33%; text-align:center">
                </td>
                <tr>

                <tr>
                    <td style="width:33%; text-align:center;">
                        <div style="margin: 30px auto 0; width:70%;"></div>
                    </td>
                    <td style="width:33%; text-align:center;">
                        <div style="border-top: 1.5px solid #000; margin: 30px auto 0; width:70%; text-align: left">Recibe:</div>
                    </td>
                    <td style="width:33%; text-align:center;">
                        <div style="margin: 30px auto 0; width:70%;"></div>
                    </td>
                </tr>

            </table>

            <!-- Sección de Notas adicionales -->
            <strong style="display: block; margin-top: 20px;">Notas adicionales</strong>
            <p class="" style="font-size: 13px; padding-left:20px; padding-right:30px; text-align: justify">{!! nl2br(e($notes)) !!}</p>

        </div>

        <div class="footer">&nbsp;</div>
    </body>
</html>
