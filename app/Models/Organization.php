<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'head_fio',
        'name',
        'address',

        'email',
        'phone',
        'bank_name',

        'bin',
        'bik',
        'iik',

        'otv_fio',
        'otv_phone',
        'otv_email',

        'mail_index',
        'domain_name',
        'license_file',
    ];

}
