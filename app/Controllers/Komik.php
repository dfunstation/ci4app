<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new komikModel();
    }

    public function index()
    {

        $data = [
            'title' => "Komik | Home",
            'komik' => $this->komikModel->getKomik()
        ];


        return view('komik/index', $data);
    }


    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);

        $data = [
            'title' => 'Detail Komik',
            'detail' => $komik
        ];

        if (empty($data['detail'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik' . $slug . 'tidak ditemukan');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {

        session();
        $data = [
            'title' => 'Tambah Data Komik',
            'validation' => \Config\Services::validation()

        ];

        return view('komik/create', $data);
    }


    public function save()
    {

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.nama]',
                'errors' => [
                    'required' => '{field} ini harus disi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'penulis ini wajib diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        }

        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);
        $penulis = $this->request->getVar('penulis');
        $penerbit = $this->request->getVar('penerbit');
        $sampul = $this->request->getVar('sampul');

        $this->komikModel->save([
            'nama' => $judul,
            'slug' => $slug,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'sampul' => $sampul
        ]);

        session()->setFlashdata('pesan', 'Data Telah ditambahkan');
        return redirect()->to('/komik');
    }

    public function delete($id_komik)
    {
        $this->komikModel->delete($id_komik);
        session()->setFlashdata('pesan', 'Data Telah dihapus');
        return redirect()->to('/Komik');
    }

    public function edit($slug)
    {
        session();
        $data = [
            'title' => 'Edit Data Komik',
            'validation' => \Config\Services::validation()

        ];

        return view('komik/create', $data);
    }
}
