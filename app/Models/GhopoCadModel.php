<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhopoCadModel extends Model
{
    use HasFactory;

    protected $table = 'ghopo_cad_bb'; //mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'no'; //mendefinisikan primary key dari tabel yang digunakan
    public $timestamps = false;

    protected $fillable = [
        'no',
        'jarak',
        'latitude',
        'longitude',
        'no_id',
        'komoditi',
        'lokasi_iup',
        'tipe_sd_cadangan',
        'sd_cadangan_ton',
        'catatan',
        'status_penyelidikan',
        'acuan',
        'kabupaten',
        'kecamatan',
        'luas_ha',
        'masa_berlaku_iup',
        'masa_berlaku_ppkh',
    ];

}
