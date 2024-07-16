<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_at', 
        'created_at', 
        'updated_at',
    ];

    public static function boot() {
        parent::boot();

        static::creating(function($table)  {
            $table->created_by = auth('sanctum')->id() ?? null;
            $table->updated_by = auth('sanctum')->id() ?? null;
        });

        static::updating(function($table)  {
            $table->updated_by = auth('sanctum')->id() ?? null;
        });
    }
}
