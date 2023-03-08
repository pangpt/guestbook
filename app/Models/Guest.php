<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;


class Guest extends Model
{
    protected $table = 'guests';

    protected $fillable = [
        '*'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
