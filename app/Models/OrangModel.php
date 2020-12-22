<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
    protected $table = 'orang';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat'];


    public function search($keyword)
    {
        // $builder = $this->like->table('orang');
        // $builder->like('nama', $pencarian);
        // return $builder;

        return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
    }
}
