<html>
<head></head>
<body>
    <form method="post" action="/rental/inserttransaksi">
        {{ csrf_field() }}
        <table>
        @foreach($plgn as $b)
        <input type="hidden" name="id" value="{{ $b->id }}">
            <tr>
                <td>Nama Customer</td>
                <td><input type="text" name="noid" required="" value="{{ $b->nama }}"></td>
            </tr>
        @endforeach
            <tr>
                <td>Plat Motor</td>
                <td> <select name="plat">
                    @foreach($motor as $m)
                    <option value="{{$m->plat_motor}}">{{$m->plat_motor}}</option>
                    @endforeach
                    </select> </td>
            </tr>
            <tr>
                <td>Jam Mulai</td>
                <td><input type="time" name="mulai" required=""></td>
            </tr>
            <tr>
                <td>Jam Akhir</td>
                <td><input type="time" name="akhir" required=""></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" required=""></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" name="status" required="" value="1" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Rental"></td>
            </tr>
        </table>
    </form>
</body>
</html>