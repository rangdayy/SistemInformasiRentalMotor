<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{URL::asset('css/style2.css')}}">

    <title>Rental Motor</title>
</head>

<body>
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" style="background-image:url(/img/cover.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-11" align="right" style="color:white; margin-top:25px;">
                    <a style="font-size:11pt">{{session('nama_user')}}</a>
                </div>
                <div class="col-1" align="left" style="color:white; margin-top:20px;">
                    <i class="fas fa-user-circle fa-2x" data-toggle="modal" data-target="#logout"></i>
                </div>
            </div>

            <div class="logo" align="center">
                <i style="color: white;" class="fas fa-biking fa-3x"></i>
                <h3>Rental Motor Salatiga</h3>
                <h6>Selamat Datang {{session('nama_user')}} </h6>
            </div>
            <hr>
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-only" href="#">Rental Motor</a>
                <button class="navbar-toggler navbar-only" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav navbar-center">
                        <a class="nav-item nav-link tombol btn btn-light  tblhome" href="/rental/motor/">Data Motor <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link tombol btn btn-light" href="/rental/customer/">Data Costumer</a>
                        <a class="nav-item nav-link tombol btn btn-light" href="/rental/transaksi/">Transaksi</a>
                        <!-- <a class="nav-item nav-link tombol btn btn-light" href="/user/logout">Logout</a> -->

                    </div>
                </div>
            </nav>
            <hr>
        </div>
        <!-- akhir Navbar -->
    </div>
    </div>
    <!-- akhir Jumbotron -->

    <div class="list">
        <div class="row">

            <div class="col-4 bab" align="center">

            </div>
            <div class="col-4 bab" align="center">
                Data Transaksi
            </div>
            <div class="col-4 bab" align="right">
                <select class="opti" id="status-rental" oninput="change()">
                    <option value="1">Sedang Rental</option>
                    <option value="0">Sudah Selesai</option>
                    <option value="2">SEMUA</option>
                </select>
            </div>
        </div>

        <!-- TABEL TRANSAKSI -->
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="tabel-transaksi">
                    <thead class="thead-dark" style="background-color: black;">
                        <tr>
                            <th>ID Costumer</th>
                            <th>Plat Motor</th>
                            <th>Jam Mulai</th>
                            <th>Jam Akhir</th>
                            <th>Lama sewa</th>
                            <th>Harga Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trans as $b)
                        @if($b->status == 1)
                        <tr id="tabel-rental">
                            <td>{{$b->id_customer}}</td>
                            <td>{{$b->plat_motor}}</td>
                            <td>{{$b->jam_mulai}}</td>
                            @if($b->jam_akhir != NULL)
                            <td>{{$b->jam_akhir}}</td>
                            <td>{{(strtotime($b->jam_akhir) - strtotime($b->jam_mulai)) / 3600}} jam</td>
                            <td>{{$b->harga}}</td>
                            @else
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            @endif
                            @if($b->status == 1)
                            <td style="text-align: center;"><button type="button" class="btn btn-sm btn-dark btntabel" onclick="show({{$b->id}}, '{{$b->plat_motor}}', '{{$b->jam_mulai}}',{{$b->harga}})">Rentai Selesai</button></td>
                            @else
                            <td style="text-align: center;"><button type="button" disabled class="btn btn-sm btn-dark btntabel">Sudah Selesai</button></td>
                            @endif
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>



            </div>

            <!-- FORM RENTAL SELESAI -->
            <!-- Modal -->
            <div class="modal fade" id="formrentalselesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="post" action="/rental/update_transaksi">
                            {{ csrf_field() }}
                            <div class="modal-header" align="center">
                                <h5 class="modal-title bab" id="exampleModalCenterTitle"> Update Transaksi</h5>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" name="id" id="selesaiid" value="">
                                <input type="hidden" name="plat" id="selesaiplat" value="">
                                <div class="row">
                                    <div class="col-5 card-text">Jam Mulai</div>
                                    <div class="col-7 card-text"><input class="tabel" type="time" name="mulai" required="" value="" id="selesaiawal" readonly /></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 card-text">Jam Akhir</div>
                                    <div class="col-7 card-text"><input class="tabel" id="akhir" type="time" id="selesaiakhir" name="akhir" required="" value="" /></div>
                                </div>

                                <input class="tabel" name="harga-jam" hidden value="" id="harga-jam" />


                                <div class="row">
                                    <div class="col-5 card-text">Harga</div>
                                    <div class="col-7 card-text"><input class="tabel" name="harga" required="" value="" id="selesai-harga" readonly /></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-dark " value="Daftar">Simpan Perubahan</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- <table border='1'>
                <a href="/rental/motor/">Data Motor </a> &nbsp;||&nbsp; <a href="/rental/customer/">Data Customer </a> &nbsp;||&nbsp; <a href="/rental/transaksi/">Data Transaksi </a>
                <br><br>
                <tr>
                    <th>ID Customer</th>
                    <th>Plat Motor</th>
                    <th>Jam Mulai</th>
                    <th>Jam Akhir</th>
                    <th>Harga Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($trans as $b)
                <tr>
                    <td>{{$b->id_customer}}</td>
                    <td>{{$b->plat_motor}}</td>
                    <td>{{$b->jam_mulai}}</td>
                    <td>{{$b->jam_akhir}}</td>
                    <td>{{$b->harga}}</td>
                    <td>{{$b->status}}</td>
                    <td><a href="/rental/edit_transaksi/{{$b->id}}">Rental Selesai></td>
                </tr>
                @endforeach
            </table> -->


        <!-- LOGOUT -->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <table border="0" style=" width: 100.5%; border-collapse: collapse;">
                            <tr>
                                <th style="text-align: center;">
                                    <img style="margin-left: -17px; margin-top: -18px; border-radius: 20px 20px 0px 0px;" src="https://scontent-sea1-1.cdninstagram.com/vp/19c9e3a37375a411ef4134a3ed5d3558/5E653B1E/t51.2885-15/e35/21909828_1716900221939403_9180221441029701632_n.jpg?_nc_ht=scontent-sea1-1.cdninstagram.com&_nc_cat=103&se=7&ig_cache_key=MTYxMDg0NDY4NjQ1NTQ2ODgzOA%3D%3D.2" class="center-cropped" alt="Choaz Bone Randa Lembang">
                                    <div class="centered">
                                        <i class="fas fa-biking fa-3x"></i><br>
                                        <a class="font-weight-light">Rental Motor Salatiga</a>
                                    </div>

                                </th>
                            </tr>
                            <tr>
                                <td style="text-align: center; padding-top: 3%; padding-bottom: 3%">
                                    <a>Apakah anda ingin melakukan Logout?</a>
                                </td>
                            </tr>
                        </table>
                        <div class="formlog" style="margin-left: 3rem;">


                            <div class="row">
                                <div class="col-6" align="right" style="margin-left: -10px;">
                                    <a href="/user/logout" class="btn btn-dark btn-xs font-weight-light">Logout</a>
                                </div>
                                <div class="col-6" align="left">
                                    <a style="color:white" class="btn btn-dark btn-xs font-weight-light" data-dismiss="modal">Batal</a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>



            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


<script type="text/javascript">
    function show($id, $plat, $awal, $harga) {
        $('#formrentalselesai').on('show.bs.modal', function() {
            $("#selesaiid").val($id);
            $("#selesaiplat").val($plat);
            $("#selesaiawal").val($awal);
            $("#harga-jam").val($harga);
        });
        $("#formrentalselesai").modal();
    }

    function change() {
        var tabel = document.getElementById('tabel-transaksi');

        var e = document.getElementById("status-rental");
        var stat = e.options[e.selectedIndex].value;

        console.log(stat);

        if (stat == 1) {
            tabel.innerHTML = '<thead class="thead-dark" style="background-color: black;">' +
                '<tr>' +
                '<th>ID Costumer</th>' +
                '<th>Plat Motor</th>' +
                '<th>Jam Mulai</th>' +
                '<th>Jam Akhir</th>' +
                '<th>lama sewa</th>' +
                '<th>Harga Total</th>' +
                '<th>Action</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '@foreach($trans as $b)' +
                '@if($b->status == 1)' +
                '<tr id="tabel-rental">' +
                '<td>{{$b->id_customer}}</td>' +
                '<td>{{$b->plat_motor}}</td>' +
                '<td>{{$b->jam_mulai}}</td>' +
                '@if($b->jam_akhir != NULL)' +
                '<td>{{$b->jam_akhir}}</td>' +
                '<td>{{(strtotime($b->jam_akhir) - strtotime($b->jam_mulai)) / 3600}} jam</td>' +
                '<td>{{$b->harga}}</td>' +
                '@else' +
                '<td>-</td>' +
                '<td>-</td>' +
                '<td>-</td>' +
                '@endif' +
                '@if($b->status == 1)' +
                '<td style="text-align: center;"><button type="button" class="btn btn-sm btn-dark btntabel" onclick="show({{$b->id}}, \'{{$b->plat_motor}}\', \'{{$b->jam_mulai}}\',{{$b->harga}})">Rentai Selesai</button></td>' +
                '@else' +
                '<td style="text-align: center;"><button type="button" disabled class="btn btn-sm btn-dark btntabel">Sudah Selesai</button></td>' +
                '@endif' +
                '</tr>' +
                '@endif' +
                '@endforeach' +
                '</tbody>';
        } else if (stat == 0) {
            tabel.innerHTML = '<thead class="thead-dark" style="background-color: black;">' +
                '<tr>' +
                '<th>ID Costumer</th>' +
                '<th>Plat Motor</th>' +
                '<th>Jam Mulai</th>' +
                '<th>Jam Akhir</th>' +
                '<th>lama sewa</th>' +
                '<th>Harga Total</th>' +
                '<th>Action</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '@foreach($trans as $b)' +
                '@if($b->status == 0)' +
                '<tr id="tabel-rental">' +
                '<td>{{$b->id_customer}}</td>' +
                '<td>{{$b->plat_motor}}</td>' +
                '<td>{{$b->jam_mulai}}</td>' +
                '@if($b->jam_akhir != NULL)' +
                '<td>{{$b->jam_akhir}}</td>' +
                '<td>{{(strtotime($b->jam_akhir) - strtotime($b->jam_mulai)) / 3600}} jam</td>' +
                '<td>{{$b->harga}}</td>' +
                '@else' +
                '<td>-</td>' +
                '<td>-</td>' +
                '<td>-</td>' +
                '@endif' +
                '@if($b->status == 1)' +
                '<td style="text-align: center;"><button type="button" class="btn btn-sm btn-dark btntabel" onclick="show({{$b->id}}, \'{{$b->plat_motor}}\', \'{{$b->jam_mulai}}\',{{$b->harga}})">Rentai Selesai</button></td>' +
                '@else' +
                '<td style="text-align: center;"><button type="button" disabled class="btn btn-sm btn-dark btntabel">Sudah Selesai</button></td>' +
                '@endif' +
                '</tr>' +
                '@endif' +
                '@endforeach' +
                '</tbody>';
        } else if (stat == 2) {
            tabel.innerHTML = '<thead class="thead-dark" style="background-color: black;">' +
                '<tr>' +
                '<th>ID Costumer</th>' +
                '<th>Plat Motor</th>' +
                '<th>Jam Mulai</th>' +
                '<th>Jam Akhir</th>' +
                '<th>lama sewa</th>' +
                '<th>Harga Total</th>' +
                '<th>Action</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '@foreach($trans as $b)' +
                '<tr id="tabel-rental">' +
                '<td>{{$b->id_customer}}</td>' +
                '<td>{{$b->plat_motor}}</td>' +
                '<td>{{$b->jam_mulai}}</td>' +
                '@if($b->jam_akhir != NULL)' +
                '<td>{{$b->jam_akhir}}</td>' +
                '<td>{{(strtotime($b->jam_akhir) - strtotime($b->jam_mulai)) / 3600}} jam</td>' +
                '<td>{{$b->harga}}</td>' +
                '@else' +
                '<td>-</td>' +
                '<td>-</td>' +
                '<td>-</td>' +
                '@endif' +
                '@if($b->status == 1)' +
                '<td style="text-align: center;"><button type="button" class="btn btn-sm btn-dark btntabel" onclick="show({{$b->id}}, \'{{$b->plat_motor}}\', \'{{$b->jam_mulai}}\',{{$b->harga}})">Rentai Selesai</button></td>' +
                '@else' +
                '<td style="text-align: center;"><button type="button" disabled class="btn btn-sm btn-dark btntabel">Sudah Selesai</button></td>' +
                '@endif' +
                '</tr>' +
                '@endforeach' +
                '</tbody>';
        }

    }

    function timetosec(time) {
        time = time.split(/:/);
        if (time[1] > 29) {
            time[0] = parseInt(time[0]) + parseInt('1');
        }
        console.log(time[0]);
        return time[0] * 3600;
    }

    $(document).ready(function() {
        $("#akhir").on('change', function() {
            var start = $("#selesaiawal").val();
            var end = $("#akhir").val();
            var harga = $("#harga-jam").val();
            var lamaSewa = (timetosec(end) - timetosec(start)) / 3600;
            var total = lamaSewa * harga;
            $("#selesai-harga").val(total);
        });
    });
</script>

</html>