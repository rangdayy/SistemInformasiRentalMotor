<html>
<head></head>
<body>
    <form method="post" action="/rental/update_customer">
        {{ csrf_field() }}
        <table>
        @foreach($plgn as $b)
        <input type="hidden" name="id" value="{{ $b->id }}">
            <tr>
                <td>No Identitas</td>
                <td><input type="text" name="noid" required="" value="{{$b->no_identitas}}"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required="" value="{{$b->nama}}"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea rows="2" cols="25" name="alamat" required="">{{$b->alamat}}</textarea></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td><input type="text" name="tlp" required="" value="{{$b->no_telp}}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Edit"></td>
            </tr>
            @endforeach
        </table>
    </form>
</body>
</html>