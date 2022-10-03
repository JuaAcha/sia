<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\Siswa;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';

    protected $guarded = [];
}
