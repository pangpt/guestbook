<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        '*'
    ];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
