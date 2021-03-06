<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPost extends Model
{
    use HasFactory;

    protected $table = "posts";

    public function getRouteKeyName()
    {
//        return parent::getRouteKeyName(); // TODO: Change the autogenerated stub
        return "url";
    }

    public function categoria()
    {
        return $this->belongsTo(TPostCategory::class,'categoria_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function imagenes()
    {
        return $this->hasMany(TPostImage::class,'post_id');
    }
}
