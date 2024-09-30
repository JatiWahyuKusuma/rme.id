<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuperAdminModel extends Model
{
    use HasFactory;

    protected $table = 'm_superadmin'; // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'no'; // Mendefinisikan primary key dari tabel yang digunakan
    public $timestamps = false;

    protected $fillable = [
        'level_id',
        'nama',
        'email',
        'password',
    ];

    // Menyembunyikan password agar tidak terlihat di response
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika Anda memiliki password yang harus di-hash, tambahkan mutator
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

       public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
