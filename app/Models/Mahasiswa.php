<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nim', 'nama', 'ipk'];
    protected $table = 'mahasiswa';
    public $timestamps = false;

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'nim', 'nim');
    }
}
