<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // QUY ƯỚC TÊN TABLE 
    /* 
    tên Model Post -> table là posts 
    ProductCategory -> product_categories 
    */
    protected $table = 'posts';

    protected $primaryKey = 'id';

   // public $incrementing = false;

   // protected $keyType = 'string';
    public $timestamps = true;

    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    protected $attributes = [
        'status'=>0
    ];

    protected $fillable = ['title','content','status'];
}
