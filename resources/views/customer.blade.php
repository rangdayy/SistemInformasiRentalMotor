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
            <i class="fas fa-user-circle fa-2x" data-toggle="modal"
                    data-target="#logout"></i>
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
                <button class="navbar-toggler navbar-only" type="button" data-toggle="collapse"
                    data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav navbar-center">
                        <a class="nav-item nav-link tombol btn btn-light  tblhome" href="/rental/motor/">Data Motor <span
                                class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link tombol btn btn-light"  href="/rental/customer/">Data Costumer</a>
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
            <div class="col-md-12 bab" align="center">
                Data Costumer
            </div>
            <div class="  col-md-12" align="right">
                <button type="button" class="btn btn-sm btn-dark btntabel" data-toggle="modal" data-target="#forminsert">Tambah Data</button>
            </div>



        </div>

        <!-- TABEL COSTUMER -->
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="tableMain">
                    <thead class="thead-dark" style="background-color: black;">
                        <tr>
                            <th>ID</th>
                            <th>Nomor Identitas</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($plgn as $b)
                    <tbody>
                        <tr>
                            <td>{{$b->id}}</td>
                            <td>{{$b->no_identitas}}</td>
                            <td>{{$b->nama}}</td>
                            <td>{{$b->alamat}}</td>
                            <td>{{$b->no_telp}}</td>
                            <td style="text-align: center;">
                                <button type="button" id="myBtn" onclick="show({{$b->id}}, '{{$b->nama}}')" class="btn btn-sm btn-dark btntabel">Rental</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <!-- FORM INSERT -->
            <!-- Modal -->
            <div class="modal fade" id="forminsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <form method="post" action="/rental/insertcustomer">
                            {{ csrf_field() }}
                            <input type="hidden" name="status" value="0">
                            <div class="modal-header" align="center">
                                <h5 class="modal-title bab" id="exampleModalCenterTitle"> Tambah Data Customer</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 card-text">ID Costumer</div>
                                    <div class="col-7 card-text"><input class="tabel" name="noid" required="" type="text" /></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 card-text">Nama</div>
                                    <div class="col-7 card-text"><input class="tabel" name="nama" required="" type="text" /></div>
                                </div>


                                <div class="row">
                                    <div class="col-5 card-text">No Telepon</div>
                                    <div class="col-7 card-text"><input class="tabel" type="text" name="tlp" required=""></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 card-text">Alamat</div>
                                    <div class="col-7 card-text"><textarea class="tabel" rows="2" cols="25" name="alamat" required=""> </textarea></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                <input class="btn btn-dark" type="submit" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- FORM RENTAL -->
            <!-- Modal -->
            <div class="modal fade" id="formrental" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <form method="post" action="/rental/inserttransaksi">
                            {{ csrf_field() }}
                            <div class="modal-header" align="center">
                                <h5 class="modal-title bab" id="exampleModalCenterTitle"> Tambah Data Costumer</h5>
                            </div>
                            <div class="modal-body">


                                <input type="hidden" readonly id="id_customer" name="id" value="">
                                <div class="row">
                                    <div class="col-5 card-text">Nama Costumer</div>
                                    <div class="col-7 card-text"><input readonly class="tabel" id="nama_customer" name="noid" required="" type="text" value="" /></div>
                                </div>

                                <div class="row">
                                    <div class="col-5 card-text">Plat Motor</div>
                                    <div class="col-7 card-text">
                                        <select id="jenis-motor" name="jenis" oninput="gantiJenis()">
                                            @foreach($jenisMotor as $j)
                                            <option value="{{$j->id}}">{{$j->nama}}</option>
                                            @endforeach
                                        </select>

                                        <select id="plat-motor" name="plat">
                                            @foreach($motorMatic as $m)
                                            <option value="{{$m->plat_motor}}">{{$m->plat_motor}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-5 card-text">Jam Mulai</div>
                                    <div class="col-7 card-text"><input class="tabel" type="time" name="mulai" required=""></div>
                                </div>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                <input class="btn btn-dark" type="submit" value="Rental">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<!-- LOGOUT -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                        <table border="0" style=" width: 100.5%; border-collapse: collapse;">
                            <tr>
                                <th style="text-align: center;">
                                    <img style="margin-left: -17px; margin-top: -18px; border-radius: 20px 20px 0px 0px;"
                                        src="https://scontent-sea1-1.cdninstagram.com/vp/19c9e3a37375a411ef4134a3ed5d3558/5E653B1E/t51.2885-15/e35/21909828_1716900221939403_9180221441029701632_n.jpg?_nc_ht=scontent-sea1-1.cdninstagram.com&_nc_cat=103&se=7&ig_cache_key=MTYxMDg0NDY4NjQ1NTQ2ODgzOA%3D%3D.2"
                                        class="center-cropped" alt="Choaz Bone Randa Lembang">
                                    <div class="centered">
                                    <i class="fas fa-biking fa-3x"></i><br>
                                        <a  class="font-weight-light">Rental Motor Salatiga</a>
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
                                    <a  style="color:white" class="btn btn-dark btn-xs font-weight-light" data-dismiss="modal">Batal</a>
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
    function show($id, $nama) {
        $('#formrental').on('show.bs.modal', function() {
            $("#nama_customer").val($nama);
            $("#id_customer").val($id);
        });
        $("#formrental").modal();
    }

    function gantiJenis() {
        var e = document.getElementById("jenis-motor");
        var jenis = e.options[e.selectedIndex].value;
        //alert(jenis);

        if (jenis == 1) {
            var mot = document.getElementById('plat-motor');
            mot.innerHTML = '<?php foreach ($motorMatic as $mm) {
                                    echo '<option value="">' . $mm->plat_motor . '</option>';
                                } ?>';
        } else if (jenis == 2) {
            var mot = document.getElementById('plat-motor');
            mot.innerHTML = '<?php foreach ($motorManu as $mm) {
                                    echo '<option value="">' . $mm->plat_motor . '</option>';
                                } ?>';
        };
        //alert('terpilih');
    }

    function hargaHensin() {

    }
</script>

</html>