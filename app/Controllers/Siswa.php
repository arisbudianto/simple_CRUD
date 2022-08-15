<?php

namespace App\Controllers;
use App\Models\ModelSiswa;

class Siswa extends BaseController
{
	public function show_siswa()
	{
		$siswa=new ModelSiswa();
		$data=$siswa->getSiswa();
		return view('showSiswa',compact('data'));
	}

    public function get_data_siswa($id){
        $siswa=new ModelSiswa();
        $data=$siswa->get_data_siswa($id);
        return view('SingleSiswa',compact('data'));
    }

    public function get_nama_siswa($id_parameter){
        $siswa=new ModelSiswa();
        $data=$siswa->get_nama_siswa($id_parameter);
        return view('NamaSiswa',compact('data'));
    }

    public function cari_siswa()
	{
		$pager = \Config\Services::pager();
    	$siswa=new ModelSiswa();
    	$kunci = $this->request->getVar('cari');

        if ($kunci) {
            $query = $siswa->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $siswa;
            $jumlah = "";
        }

        $data['siswa'] = $query->paginate(10);
        $data['pager'] = $siswa->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['jumlah'] = $jumlah;

        echo view('list_siswa',$data);
	}
}
