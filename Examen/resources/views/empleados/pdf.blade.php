<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        body {
            border: #001f3f solid 3px;
        }
    </style>
</head>

<body>

    <div style="padding: 10px;">
        <table width="100%">
            <tr>
                <td valign="top"><img
                        src="https://media.discordapp.net/attachments/747673943338385429/1099188084270174298/logo.png?width=1373&height=649"
                        width="150" height="100"></td>
                <td align="right">
                    <h3>Instituto Superior Tecnologico Japon</h3>
                    <pre>
            </pre>
                </td>
            </tr>

        </table>


        <br />

        <table width="100%">
            <thead style="background-color: lightgray;">
                <tr>
                    <th style="color: #fff">ID</th>
                    <th style="color: #fff">Cedula</th>
                    <th style="color: #fff">Nombre</th>
                    <th style="color: #fff">Correo</th>
                    <th style="color: #fff">Cargo</th>
                    <th style="color: #fff">Ciudad</th>
                    <th style="color: #fff">Salario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee as $employee)
                    <tr>
                        <td>
                            <b>
                                <center>{{ $employee->id }}</center>
                            </b>
                        </td>
                        <td>
                            <b>
                                <center>{{ $employee->cedula }}</center>
                            </b>
                        </td>
                        <td>
                            <b>
                                <center>{{ $employee->nombre }}</center>
                            </b>
                        </td>
                        <td>
                            <b>
                                <center>{{ $employee->correo }}</center>
                            </b>
                        </td>
                        <td>
                            <b>
                                <center>{{ $employee->cargo }}</center>
                            </b>
                        </td>
                        <td>
                            <b>
                                <center>{{ $employee->ciudad }}</center>
                            </b>
                        </td>
                        <td>
                            <b>
                                <center>{{ $employee->salario }}</center>
                            </b>
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>
    </div>

</body>

</html>
