<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [ 'title', 'excerpt', 'body', 'image', 'category_id' ];



    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }


}