<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug', 'description', 'link_git','type_id'
    ];

    public function types()
    {
        return $this->belongsTo(Type::class);
    }
}

