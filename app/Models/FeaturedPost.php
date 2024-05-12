<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'featured_posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'post_id',
        'order',
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

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
