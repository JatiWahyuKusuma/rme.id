<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SGVenModel extends Model
{
    use HasFactory;

    protected $table = 'sg_ven_bb'; //mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'no'; //mendefinisikan primary key dari tabel yang digunakan
    public $timestamps = false;

    protected $fillable = [
        'no',
        'jarak',
        'latitude',
        'longitude',
        'vendor',
        'komoditi',
        'desa',
        'kecamatan',
        'kabupaten',
        'kap_ton_thn',
        'konsumsi_ton_thn',
    ];
}
