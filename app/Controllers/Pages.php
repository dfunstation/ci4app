<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Kiki Agustin',
            'mahasiswa' => ['Kiki Agustin', 'Mega Kusmayati', 'David Abdul Aziz', 'Isma']
        ];

        return view('pages/home', $data);
    }

    public function about()
    {

        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {

        $data = [
            'title' => 'Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. soekarno Hatta No. 15',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Jl. Cibaduyut No. 57A',
                    'kota' => 'Bandung'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }

    //--------------------------------------------------------------------

}
