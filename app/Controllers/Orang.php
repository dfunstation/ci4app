<?php

namespace App\Controllers;

use App\Models\OrangModel;


class Orang extends BaseController
{
    protected $OrangModel;
    public function __construct()
    {
        $this->OrangModel = new OrangModel();
    }

    public function index()
    {
        $halaman = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $orang = $this->OrangModel->search('keyword');
        } else {
            $orang = $this->OrangModel;
        }

        $data = [
            'title' => "Daftar Orang",
            // 'orang' => $this->OrangModel->findall()
            'orang' => $orang->paginate(6, 'orang'),
            'pager' => $this->OrangModel->pager,
            'halaman' => $halaman
        ];


        return view('orang/index', $data);
    }
}
