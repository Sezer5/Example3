<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    protected $fillable = ['title', 'desc', 'thumbnail'];

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'novel_keyword', 'novel_id', 'keyword_id');
    }
}
