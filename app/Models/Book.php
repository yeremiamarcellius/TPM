<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'Judul',
        'Penulis',
        'Stock',
        'PublishDate',
        'image',
        'category_id' //fk
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
