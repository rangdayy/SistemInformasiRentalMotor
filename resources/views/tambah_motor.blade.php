<html>
<head></head>
<body>
    <form method="post" action="/rental/insertmotor">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>Plat Nomor</td>
                <td><input type="text" name="plat" required=""></td>
            </tr>
            <tr>
                <td>Jenis Motor</td>
                <td> <select name="jenis">
                    @foreach($jenis as $j)
                    <option value="{{$j->id}}">{{$j->id}}</option>
                    @endforeach
                    </select> </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>