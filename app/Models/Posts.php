<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
    ];

    public function scopeSelectById($query, $id) {
        return $query -> where('id', $id);
    }
}
