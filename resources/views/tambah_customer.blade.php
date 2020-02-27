<html>
<head></head>
<body>
    <form method="post" action="/rental/insertcustomer">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>No Identitas</td>
                <td><input type="text" name="noid" required=""></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required=""></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea rows="2" cols="25" name="alamat" required=""> </textarea></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td><input type="text" name="tlp" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>