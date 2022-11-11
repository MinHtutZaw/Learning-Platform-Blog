<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'intro', 'body'];
    ///protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
