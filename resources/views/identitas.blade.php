<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Nama</th>
            <th>Umur</th>
            
        </thead>
        <tbody>
            @foreach($iden as $a)
            <tr>
                <td>{{$a->nama}}</td>
                <td>{{$a->umur}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
<form method="post" action="/rental/identitas">
{{csrf_field()}}
Nama
<input type="text" name="nama"><br>
Umur
<input type="text" name="umur"><br>
<input type="submit">
</form>
</body>
</html>