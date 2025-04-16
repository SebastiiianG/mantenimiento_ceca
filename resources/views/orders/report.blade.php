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
                color: #222222
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
                color: #222222;
            }
            /* Utilizar counter() para mostrar la numeración */
            .footer:after {
                display: block;
                content: "Página " counter(page);
            }

            .table.table-bordered {
                font-size: 10px;
            }
            /* Reforzar los bordes de la tabla */
            .table.table-bordered th,
            .table.table-bordered td {
                border: 1px solid #222222 !important;
            }
    </style>

    </head>
    <body>
        <div class="pdf-container">
            <div class="footer">&nbsp;</div>
            <!-- Encabezado usando tabla: -->
            <table class="header-table">
                <tr>
                    <!--Logo UAEH-->
                    <td style="width:20%; text-align:left; vertical-align: top;">
                        <img src="{{ asset('storage/uaehLogo.png') }}" alt="Logo UAEH" style="width:150px;">
                    </td>
                    <!--Titulos-->
                    <td style="width:55%; text-align:center; vertical-align: bottom;">
                        <span style="display:block; margin-top:20px; font-size:20px;"><strong>UNIVERSIDAD AUTÓNOMA DEL ESTADO DE HIDALGO</strong></span>
                        <span style="display:block; font-size:20px;"><strong>CENTRO DE CÓMPUTO ACADÉMICO</strong></span>
                        <span style="display:block; font-size:12px;">AV. UNIVERSIDAD S/N COL. SANTIAGO JALTEPEC</span>
                        <span style="display:block; font-size:15px;">ÁREA DE MANTENIMIENTO DE EQUIPO DE CÓMPUTO</span>
                    </td>
                    <!--Logo CECA-->
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
            <table class="table table-bordered" style="text-align:center; padding: 0px; margin-top: 10px;">
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
                            <td>{{ $order->order_number . ' / ' . $loop->iteration . ' ' . ($device->cgKindObject ? $device->cgKindObject->object : 'Sin tipo de dispositivo') }}</td>
                            <td>{{ $device->cgBrand ? $device->cgBrand->brand_name : 'Sin marca' }}</td>
                            <td>{{ $device->model }}</td>
                            <td>{{ $device->serial_number }}</td>
                            <td>{{ $device->cgKindFailure ? $device->cgKindFailure->failure : 'Sin tipo de falla' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <table class="signs-table">
                <!-- Primera fila con los títulos -->
                <tr>
                    <td style="width:33%; text-align:center">
                        Área de Mtto. de Eq. de Cómp.
                    </td>
                    <td style="width:33%; text-align:center">
                        Conformidad
                    </td>
                    <td style="width:33%; text-align:center">
                        Firma de recepción
                    </td>
                </tr>
                <!-- Segunda fila para la firma -->
                <tr>
                    <td style="width:33%; text-align:center;">
                        <div style="border-top: 1.5px solid #000; margin: 30px auto 0; width:70%;">Sistema de mantenimiento</div>
                    </td>
                    <td style="width:33%; text-align:center;">
                        <div style="border-top: 1.5px solid #000; margin: 30px auto 0; width:70%;">{{ $order->client_delivered }}</div>
                    </td>
                    <td style="width:33%; text-align:center;">
                        <div style="border-top: 1.5px solid #000; margin: 30px auto 0; width:70%; text-align: left">Recibe:</div>
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
