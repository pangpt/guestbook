<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Office extends Model
{
    protected $table = 'office_settings';

    protected $fillable = [
        '*'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
