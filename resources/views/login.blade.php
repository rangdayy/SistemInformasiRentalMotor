<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->

</head>

<body>
    <!-- Navigation -->


    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead bg" style="background-image: url(/img/hero-bg.jpg);">
        <div class="container h-100 x-100">
            <div class="row h-100 align-items-center">
                <div class="hihi col-12">
                    <h1 class="font-weight-light">Rental Motor Salatiga</h1>
                    <p class="lead">Selamat datang di website aplikasi Rental Motor Salatiga</p>
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalCenter">Login</button>
                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form method="post" action="/rental/login">
                        {{ csrf_field() }}
                        <table border="0" style=" width: 100.5%; border-collapse: collapse;">
                            <tr>
                                <th style="text-align: center;">
                                    <img style="margin-left: -17px; margin-top: -18px; border-radius: 25px 25px 0px 0px;" src="https://scontent-sea1-1.cdninstagram.com/vp/19c9e3a37375a411ef4134a3ed5d3558/5E653B1E/t51.2885-15/e35/21909828_1716900221939403_9180221441029701632_n.jpg?_nc_ht=scontent-sea1-1.cdninstagram.com&_nc_cat=103&se=7&ig_cache_key=MTYxMDg0NDY4NjQ1NTQ2ODgzOA%3D%3D.2" class="center-cropped" alt="Choaz Bone Randa Lembang">
                                    <div class="centered">
                                        <i class="fas fa-biking fa-3x"></i>
                                        <h3 class="font-weight-light">Rental Motor Salatiga</h3>
                                    </div>

                                </th>
                            </tr>
                            <tr>
                                <td style="text-align: center; padding-top: 3%; padding-bottom: 3%">
                                    <h6>Silahkan login untuk melanjutkan!</h6>
                                </td>
                            </tr>
                        </table>
                        <div class="formlog" style="margin-left: 3rem;">


                            <div class="row">
                                <div class="col-12"><label Email>Username</label></div>
                            </div>
                            <div class="row">
                                <div class="col-12"><input class="tabel" name="id" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><label Email>Password</label></div>
                            </div>
                            <div class="row">
                                <div class="col-12"><input class="tabel" name="pass" id="txtSandi" type="password" required />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12" align="center">
                                    <button type="submit" class="btn btn-dark btn-xs font-weight-light">Login</button>
                                </div>
                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>

</body>
<script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>