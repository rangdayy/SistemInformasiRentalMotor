<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    //---------------------------------FUNGSI TB MOTOR---------------------------
    function motor()
    {
        
            $data2 = DB::table('tb_jenis')->get();
            $data = DB::table('tb_motor')
                ->join('tb_jenis', 'tb_motor.jenis_motor', '=', 'tb_jenis.id')
                ->select('tb_motor.*', 'tb_jenis.*')
                ->get();
            return view('motor', ['motor' => $data], ['jenis' => $data2]);
        
    }

    function insertmotor(Request $req)
    {
        $data = DB::table('tb_motor')->where('plat_motor', $req->plat)->get();

        if ($data->isEmpty()) {
            DB::table('tb_motor')->insert(
                [
                    'plat_motor' => $req->plat,
                    'jenis_motor' => $req->jenis,
                    'status' => $req->status
                ]
            );
            return redirect('/rental/motor');
        } else {
            return 'sudah ada motor dengan plat tersebut';
        }
    }
    function hapus_motor($id)
    {
        DB::table('tb_motor')->where('plat_motor', $id)->delete();
        return redirect('rental/motor');
    }
    //---------------------------------FUNGSI TB CUSTOMER---------------------------
    function customer()
    {
        if (session()->has('nama_user')) {
            $data = DB::table('tb_customer')->get();
            $data1 = DB::table('tb_motor')->where('status', 0)->where('jenis_motor', 1)->get();
            $data2 = DB::table('tb_motor')->where('status', 0)->where('jenis_motor', 2)->get();
            $data3 = DB::table('tb_jenis')->get();
            return view('customer', ['plgn' => $data, 'motorMatic' => $data1, 'motorManu' => $data2, 'jenisMotor' => $data3]);
        } else {
            return 'belum ada session';
        }
    }
    function tambah_customer()
    {
        return view('tambah_customer');
    }
    function insertcustomer(Request $req)
    {
        DB::table('tb_customer')->insert(
            [
                'no_identitas' => $req->noid,
                'nama' => $req->nama,
                'alamat' => $req->alamat,
                'no_telp' => $req->tlp
            ]
        );
        return redirect('/rental/customer');
    }
    function edit_customer($id)
    {
        $data = DB::table('tb_customer')->where('id', $id)->get();
        return view('edit_customer', ['plgn' => $data]);
    }
    function update_customer(Request $req)
    {
        DB::table('tb_customer')->where('id', $req->id)->update(
            [
                'no_identitas' => $req->noid,
                'nama' => $req->nama,
                'alamat' => $req->alamat,
                'no_telp' => $req->tlp
            ]
        );
        return redirect('/rental/customer');
    }
    //---------------------------------FUNGSI TB TRANSAKSI---------------------------
    function transaksi()
    {
        if (session()->has('nama_user')) {
            $data = DB::table('tb_transaksi')
                ->join('tb_motor', 'tb_transaksi.plat_motor', '=', 'tb_motor.plat_motor')
                ->join('tb_jenis', 'tb_jenis.id', '=', 'tb_motor.jenis_motor')
                ->orderBy('status', 'desc')
                ->select('tb_transaksi.*', 'tb_jenis.harga')
                ->get();
            return view('transaksi', ['trans' => $data]);
        } else {
            return 'Belum ada session';
        }
    }
    function inserttransaksi(Request $req)
    {
        DB::table('tb_transaksi')->insert(
            [
                'id_customer' => $req->id,
                'plat_motor' => $req->plat,
                'jam_mulai' => $req->mulai,
                'jam_akhir' => $req->akhir,
                'harga' => $req->harga,
                'status' => 1
            ]
        );
        DB::table('tb_motor')->where('plat_motor', $req->plat)->update(
            ['status' => 1]
        );
        return redirect('/rental/transaksi');
    }
    function edit_transaksi($id)
    {
        $data = DB::table('tb_transaksi')->where('id', $id)->get();
        return view('edit_transaksi', ['trans' => $data]);
    }
    function update_transaksi(Request $req)
    {
        DB::table('tb_transaksi')->where('id', $req->id)->update(
            [
                'jam_akhir' => $req->akhir,
                'harga' => $req->harga,
                'status' => 0
            ]
        );
        DB::table('tb_motor')->where('plat_motor', $req->plat)->update(
            ['status' => 0]
        );
        return redirect('/rental/transaksi');
    }
    //---------------------------------FUNGSI RENTAL---------------------------
    function proses($id)
    {
        $data = DB::table('tb_motor')->where('status', 0)->get();
        $data2 = DB::table('tb_customer')->where('id', $id)->get();
        return view('proses', ['motor' => $data], ['plgn' => $data2]);
    }
    //---------------------------------FUNGSI LOGIN---------------------------
    function login(Request $req)
    {
        if ($req->has('id') && $req->has('pass')) {
            $data = DB::table('tb_akun')->get();
            $cek = $req->id;
            $cek2 = $req->pass;
            foreach ($data as $a) {
                if ($a->username == $cek && $a->password == $cek2) {
                    session(['nama_user' => $a->nama]);
                    return redirect('/rental/motor');
                } else {
                    echo "tampilan kalau salah id atau pas saat login";
                }
            }
        } else {
            return view('login');
        }
    }

    //user
    function logout()
    {
        session()->flush();
        return redirect('/rental/login');
    }
    function identitas(Request $req)
    {
        if($req->has('nama')){
            DB::table('tb_identitas')->insert(
                [
                    'nama' => $req->nama,
                    'umur' => $req->umur
                ]
            );
            return redirect('/rental/identitas');       
        }else{
            $data = DB::table('tb_identitas')->get();
            return view('identitas', ['iden' => $data]);
        }
    }
}
