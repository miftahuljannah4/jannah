<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\TestStatus\Success;

class LokasiController extends Controller
{
    public function lokasikantor(){
        $lokasi_kantor = DB::table('lokasi_kantor')->where('id',1)->first();
        return view('lokasi.lokasikantor',compact('lokasi_kantor'));
    }

    public function updatelokasi(Request $request){
        $lokasi_kantor = $request->lokasi_kantor;
        $radius = $request->radius;

        $updatelokasi = DB::table('lokasi_kantor')->where('id',1)->update([
            'lokasi_kantor' => $lokasi_kantor,
            'radius' => $radius
        ]);
        if($updatelokasi){
            return Redirect::back()->with(['success'=>'Berhasil Di Ubah']);
        }else{
            return Redirect::back()->with(['error'=>'Gagal Di Ubah']);
        }

    }
    public function jamkerja(){
        $jamkerja = DB::table('jam_kerja')->orderBy('id_jam')->get();

        return view('lokasi.jamkerja', compact('jamkerja'));
    }
    public function storejam(Request $request){
        $nama_jam = $request->nama_jam;
        $awal_jam_masuk = $request->awal_jam_masuk;
        $jam_masuk = $request->jam_masuk;
        $akhir_jam_masuk = $request->akhir_jam_masuk;
        $jam_pulang = $request->jam_pulang;

        $data =[
            'nama_jam' => $nama_jam,
            'awal_jam_masuk' => $awal_jam_masuk,
            'jam_masuk'=> $jam_masuk,
            'akhir_jam_masuk' => $akhir_jam_masuk,
            'jam_pulang' => $jam_pulang,
        ];
        try {
            DB::table('jam_kerja')->insert($data);
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } catch (\Throwable $th) {
            //dd($th);
            return Redirect::back()->with(['error' => 'Gagal Di simpan']);
        }
    }
    public function editjam(Request $request){
        $id_jam=$request->id_jam;
        $jam_kerja = DB::table('jam_kerja')->where('id_jam',$id_jam)->first();
        return view('lokasi.editjam', compact('jam_kerja'));
    }
    public function updatejam($id_jam, Request $request){
        $id_jam = $request->id_jam;
        $nama_jam = $request->nama_jam;
        $awal_jam_masuk = $request->awal_jam_masuk;
        $jam_masuk = $request->jam_masuk;
        $akhir_jam_masuk = $request->akhir_jam_masuk;
        $jam_pulang = $request->jam_pulang;
        try {
            $data =[
                'nama_jam' => $nama_jam,
                'awal_jam_masuk' => $awal_jam_masuk,
                'jam_masuk'=> $jam_masuk,
                'akhir_jam_masuk' => $akhir_jam_masuk,
                'jam_pulang' => $jam_pulang,
            ];
            $update = DB::table('jam_kerja')->where('id_jam',$id_jam)->update($data);
            if($update){
                return Redirect::back()->with(['success' => 'Data Berhasil Update']);
            }
        } catch (\Throwable $th) {
            dd($th);
            return Redirect::back()->with(['error' => 'Gagal Di Update']);
        }
    }
    public function deletejam($id_jam){
        $delete = DB::table('jam_kerja')->where('id_jam',$id_jam)->delete();
        if($delete){
            return Redirect::back()->with(['success'=>'Berhasil Di Hapus']);
        }else{
            return Redirect::back()->with(['error'=>'Gagal Di Hapus']);
        }
    }
    public function setting($nik){
        $karyawan = DB::table('pegawais')->where('nik',$nik)->first();
        $jam_kerja = DB::table('jam_kerja')->orderBy('id_jam')->get();
        $cekjamkerja = DB::table('hari')->where('nik',$nik)->count();
        if ($cekjamkerja) {
            $setjamkerja = DB::table('hari')->where('nik',$nik)->get();
            return view('lokasi.editsetting', compact('karyawan','jam_kerja','setjamkerja'));
        }else {
            return view('lokasi.setting', compact('karyawan','jam_kerja'));
        }

    }
    public function setstorejam(Request $request){
        $nik = $request->nik;
        $hari = $request->hari;
        $id_jam = $request->id_jam;
        for ($i=0; $i < count($hari) ; $i++) {
            $data[] =[
                'nik' => $nik,
                'hari' => $hari[$i],
                'id_jam' => $id_jam[$i]
            ];
        }
        try {
            Hari::insert($data);
        return redirect()->back()->with(['success'=> 'Jam Kerja Berhasil']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=> 'Gagal']);
        }
    }
    public function updatesetting(Request $request){
        $nik = $request->nik;
        $hari = $request->hari;
        $id_jam = $request->id_jam;
        for ($i=0; $i < count($hari) ; $i++) {
            $data[] =[
                'nik' => $nik,
                'hari' => $hari[$i],
                'id_jam' => $id_jam[$i]
            ];
        }
        DB::beginTransaction();
        try {
            DB::table('hari')->where('nik',$nik)->delete();
            Hari::insert($data);
            DB::commit();
        return redirect()->back()->with(['success'=> 'Jam Kerja Berhasil']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error'=> 'Gagal']);
        }
    }
}
