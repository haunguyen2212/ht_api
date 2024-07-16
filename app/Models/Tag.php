<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'pivot',
        'created_by',
        'updated_by',
        'deleted_at', 
        'created_at', 
        'updated_at',
    ];
}
