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
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal gambar 1 mb',
                    'is_image' => 'Yang ada pilih bukan gambar',
                    'mime_in' => 'Yang ada pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        // Ambil file gambar dari input
        $fileGambar = $this->request->getFile('sampul');

        if ($fileGambar->getError() == 4) {
            $namaFile = 'default.png';
        } else {
            // Generate nama random
            $namaFile = $fileGambar->getRandomName();

            // Pindahkan gambar ke folder
            $fileGambar->move('img', $namaFile);
        }


        // Ambil nama gambar
        // $namaFile = $fileGambar->getName();

        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);
        $penulis = $this->request->getVar('penulis');
        $penerbit = $this->request->getVar('penerbit');
        $sampul = $namaFile;

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

        // Cari gambar berdasarkan id
        $komik = $this->komikModel->find($id_komik);

        // Cek Kondisi
        if ($komik['sampul'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $komik['sampul']);
        }

        $this->komikModel->delete($id_komik);
        session()->setFlashdata('pesan', 'Data Telah dihapus');
        return redirect()->to('/Komik');
    }

    public function edit($id_komik)
    {

        $komik = $this->komikModel->komikId($id_komik);
        $data = [
            'title' => 'Edit Data Komik',
            'validation' => \Config\Services::validation(),
            'id_komik' => $komik

        ];

        return view('komik/edit', $data);
    }


    public function update($id_komik)
    {


        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} ini harus disi'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal gambar 1 mb',
                    'is_image' => 'Yang ada pilih bukan gambar',
                    'mime_in' => 'Yang ada pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/Komik/edit/' . $this->request->getVar('id_komik'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        $sampulLama = $this->request->getVar('sampulLama');

        // Cek gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $sampulLama;
        } else {
            // Random Nama
            $namaSampul = $fileSampul->getRandomName();

            // Pindahkan gambar ke directori
            $fileSampul->move('img', $namaSampul);

            // Hapus Gambar yang lama
            if (!$sampulLama == 'default.png') {

                unlink('img/' . $sampulLama);
            }
        }

        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);
        $penulis = $this->request->getVar('penulis');
        $penerbit = $this->request->getVar('penerbit');
        $sampul = $namaSampul;
        $this->komikModel->save([
            'id_komik' => $id_komik,
            'nama' => $judul,
            'slug' => $slug,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'sampul' => $sampul
        ]);
        session()->setFlashdata('pesan', 'Data Telah diedit');
        return redirect()->to('/komik');
    }
}
