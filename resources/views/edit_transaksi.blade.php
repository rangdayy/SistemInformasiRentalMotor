<html>
<head></head>
<body>
    <form method="post" action="/rental/update_transaksi">
        {{ csrf_field() }}
        <table>
        @foreach($trans as $b)
        <input type="hidden" name="id" value="{{ $b->id }}">
        <input type="hidden" name="plat" value="{{ $b->plat_motor }}">
            <tr>
                <td>Jam Mulai</td>
                <td><input type="time" name="mulai" required="" value="{{$b->jam_mulai}}" readonly></td>
            </tr>
            <tr>
                <td>Jam Akhir</td>
                <td><input type="time" name="akhir" required="" value="{{$b->jam_akhir}}"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" required="" value="{{$b->harga}}"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" name="status" required="" value="0" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Selesai"></td>
            </tr>
            @endforeach
        </table>
    </form>
</body>
</html>