<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOLTETA DE LIQUIDACION {{$data['cash_date_opening']}} {{$data['cash_time_opening']}}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-spacing: 0;
            border: 1px solid black;
        }

        .celda {
            text-align: center;
            padding: 5px;
            border: 0.1px solid black;
        }

        th {
            padding: 5px;
            text-align: center;
            border: 0.1px solid #0088cc;
        }

        .title {
            font-weight: bold;
            padding: 5px;
            font-size: 20px !important;
            text-decoration: underline;
        }

        p > strong {
            margin-left: 5px;
            font-size: 12px;
        }

        thead tr th {
            font-weight: bold;
            background: #0088cc;
            color: white;
            text-align: center;
        }

        .width-custom {
            width: 50%
        }

        .border-padding {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            width: 50%;
            text-align: right;
        }

        .table-list {
            border-collapse: collapse;
        }

        .table-list tbody tr td {
            border: 1px solid black;
            padding: 8px;
        }

        .background-gray {
            background-color: #F0F0F0;
        }

        .background-green-1 {
            background-color: #B7EA8B;
        }

        .background-green-2 {
            background-color: #91D15C;
        }

        .background-cream {
            background-color: #FFDFA6;
        }

        .background-orange {
            background-color: #FA9C2C;
        }

        .background-purple {
            background-color: #AD6CD3;
        }
    </style>
</head>
<body>
<div>
    <table style="border: none;">
        <tbody>
            <tr>
                <td style="width: 50%"></td>
                <td class="border-padding"><strong>BOLETA DE LIQUIDACION - 2023</strong></td>
            </tr>
        </tbody>
    </table>
</div>
<div>
    <table class="table-list">
        <tbody>
            <tr>
                <td class="background-gray"><strong>Nombres y apellidos :</strong></td>
                <td colspan="3" class="background-gray">{{$data['cash_user_name']}}</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td class="background-gray"><strong>Placa de Vehiculo :</strong></td>
                <td colspan="3" class="background-gray"></td>
                <td class="background-gray"><strong>Fecha :</strong></td>
                <td class="background-gray">{{date('Y-m-d')}}</td>
            </tr>
            <tr>
                <td class="background-gray">LIQUIDACION POR DIA</td>
                <td colspan="3" class="background-gray"></td>
                <td class="background-gray"></td>
                <td class="background-gray"></td>
            </tr>
            <tr>
                <td class="background-gray"><strong>TRANSITO</strong></td>
                <td class="background-gray"><strong>1ER VIAJE</strong></td>
                <td class="background-gray"><strong>2DO VIAJE</strong></td>
                <td class="background-gray"><strong>3ER VIAJE</strong></td>
                <td class="background-gray"><strong>4TO VIAJE</strong></td>
                <td class="background-gray"><strong>TOTALES</strong></td>
            </tr>
            <tr>
                <td class="background-gray"><strong>SALIDA DE CARGA</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
            </tr>
            <tr>
                <td class="background-gray"><strong>ENTRADA DE CARGA</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
            </tr>
            <tr>
                <td class="background-gray"><strong>PRESTAMO/DEVOLUCION DE CARGA</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
                <td class="background-gray"><strong>[llenar]</strong></td>
            </tr>
            <tr>
                <td colspan="5" class="background-green-1"><strong>TOTAL DE VENTAS DE GLP</strong></td>
                <td class="background-green-2">[llenar]</td>
            </tr>
            <tr>
                <td class="background-green-2"><strong>DEVOLUCIONES</strong></td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td>DEVOLUCIONES DE GLP</td>
                <td colspan="4"></td>
                <td class="background-gray"></td>
            </tr>
            <tr>
                <td class="background-green-2"><strong>VENTAS</strong></td>
                <td colspan="2">[falta]</td>
                <td><strong>CANTIDAD</strong></td>
                <td><strong>PRECIO UNI</strong></td>
                <td>[falta]</td>
            </tr>
            <tr>
                <td class="background-cream">PRECIO A DOMICILIO</td>
                <td class="background-cream" colspan="2">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
            </tr>
            <tr>
                <td>PRECIO AL POR MAYOR</td>
                <td colspan="2">[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
            </tr>
            <tr>
                <td class="background-cream">PRECIO yuramayo</td>
                <td class="background-cream" colspan="2">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
            </tr>
            <tr>
                <td>VALVULA PREMIUM</td>
                <td colspan="2">[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
            </tr>
            <tr>
                <td class="background-cream">FISE DOMICILIO</td>
                <td class="background-cream" colspan="2">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
            </tr>
            <tr>
                <td>VENTA DE CILINDROS</td>
                <td colspan="2">[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
            </tr>
            <tr>
                <td class="background-cream">PAGO DE CREDITO</td>
                <td class="background-cream" colspan="2">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
            </tr>
            <tr>
                <td>PROMOCION</td>
                <td colspan="2">[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
                <td>[falta]</td>
            </tr>
            <tr>
                <td class="background-cream">CREDITO</td>
                <td class="background-cream" colspan="2">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
                <td class="background-cream">[falta]</td>
            </tr>
            <tr>
                <td class="background-green-1" colspan="5"><strong>TOTAL VENTAS</strong></td>
                <td class="background-green-2">[llenar]</td>
            </tr>
            <tr>
                <td class="background-green-2"><strong>GASTOS</strong></td>
                <td colspan="5">[falta]</td>
            </tr>
            <tr>
                <td class="background-cream" colspan="5"><strong>COMBUSTIBLE</strong></td>
                <td class="background-cream">[falta]</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"></td>
                <td></td>
            </tr>
            <tr>
                <td class="background-purple"><strong>YAPE</strong></td>
                <td class="background-purple" colspan="4">[falta]</td>
                <td class="background-purple">[falta]</td>
            </tr>
            <tr>
                <td class="background-cream" colspan="5"><strong>TOTAL NETO A CANCELAR</strong></td>
                <td class="background-orange">[llenar]</td>
            </tr>
            <tr>
                <td class="background-green-1"><strong>PROMOCIONES</strong></td>
                <td class="background-green-1"></td>
                <td class="background-green-1"><strong>TOTAL </br>GRANDE</strong></td>
                <td class="background-green-1"></td>
                <td class="background-green-1"><strong>PEQUEÑO</strong></td>
                <td class="background-green-1"><strong>TOTAL PEQUEÑO</strong></td>
            </tr>
            <tr>
                <td>SALIDAS DE PROMOCIONES</td>
                <td></td>
                <td class="background-green-1" rowspan="2"></td>
                <td></td>
                <td rowspan="2"></td>
                <td></td>
            </tr>
            <tr>
                <td>DEVOLUCION DE PROMOCION</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
