<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nim', 'email', 'noHp', 'semester', 'jenisBeasiswa', 'fileBerkas', 'status_ajuan', 'ipk'];
    protected $table = 'pendaftaran';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
