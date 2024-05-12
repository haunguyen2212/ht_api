<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'post_tags';
    protected $primaryKey = 'id';
    protected $fillable = [
        'post_id',
        'tag_id',
        'deleted_at',
        'created_by',
        'updated_by',
    ];
}
