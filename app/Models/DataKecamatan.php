<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKecamatan extends Model
{
    use HasFactory;
    protected $table = 'm_kecamatan';
    public $timestamps = false;
    public $incrementing = false;
    protected $dates = ['created_time', 'updated_time', 'deleted_time'];
    protected $fillable =[
        'provinsi', 'kota', 'kelurahan', 'nama', 'status', 'created_time', 'created_by', 'updated_time', 'updated_by', 'deleted_time', 'deleted_by'
    ];
}