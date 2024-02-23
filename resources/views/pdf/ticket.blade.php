<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        color: #333333;

    }

    header {
        text-align: center
    }

    img {
        width: 200px;
        height: 50px
    }

    table {
        width: 100%;
        border-collapse: collapse;
        /* margin-bottom: 20px; */
    }

    th,
    td {
        /* border: 1px solid #ddd; */
        padding: 8px;
        text-align: left;
    }

    th {
        /* background-color: #f2f2f2; */
    }

    tr:nth-child(even) {
        /* background-color: #f9f9f9; */
    }

    .barra {
        background-color: rgb(52, 156, 182);
        width: 400px;
        height: 20px;
    }
</style>

<body>
    <table>
        <tr>
            <th>
                <img src="https://munipillcomarca.gob.pe/logo3.png" alt="">
            </th>
            <th>
                <div class="barra">
            </th>
        </tr>
    </table>
    </div>
    </div>
    <header>
        <table>
            <tr>
                <th>
                    <u> FICHA TECNICA Nº0000{{ $tickets->id }}-2024-MDPM-INFORMATICA</u>
                </th>
                <th>
                    FECHA: {{ \Carbon\Carbon::parse($tickets->fecha_conclu)->format('d-m-Y') }}

                </th>
            </tr>
        </table>
        {{-- <hr> --}}
    </header>
    <br>
    <div>

        <p>
            Usuario: {{ $tickets->user->nombres }} {{ $tickets->user->apellidos }}
        </p>
        <p>
            Área Usuaria: {{ $tickets->user->dependencia->nombre_dependencia }}
        </p>
        <p>
            Patrimonio revisado: <br>
            - {{ $tickets->hardware->tipo->nombre }} <br>
            - {{ $tickets->hardware->cod_patri }} <br>
            - {{ $tickets->hardware->procesador }} <br>
            - {{ $tickets->hardware->marca }} <br>
        </p>
        <hr>
        <p>
            Solicitud:
        </p>
        <p>
            {{ $tickets->detalle }}
        </p>
        <p>
            Conclusión:
        </p>
        <p>
            {{ $tickets->conclusion }}
        </p>
    </div>
</body>

</html>
