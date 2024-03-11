<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $table = 'rumahs';

    protected $fillable = [
        'namarumah',
        'category_id',
        'tiperumah',
        'hargarumah',
        'alamatrumah',
        'deskripsirumah',
        'foto',
        'status'
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
