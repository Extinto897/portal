<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Aleatoria</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            <script>
                function getRandomInt(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                }
                
                let names = ["Ana", "Luis", "Carlos", "Marta", "Jorge"];
                
                for (let i = 1; i <= 5; i++) {
                    document.write("<tr>");
                    document.write(`<td>${i}</td>`);
                    document.write(`<td>${names[getRandomInt(0, names.length - 1)]}</td>`);
                    document.write(`<td>${getRandomInt(18, 60)}</td>`);
                    document.write("</tr>");
                }
            </script>
        </tbody>
    </table>
</body>
</html>