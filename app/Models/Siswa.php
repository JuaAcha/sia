<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Mapel;

class Siswa extends Model
{
    use HasFactory;

     protected $table = 'siswa';

    
     protected $guarded = [];

     public function Kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function Mapel(){
        return $this->belongsTo(Mapel::class);
    }
}
