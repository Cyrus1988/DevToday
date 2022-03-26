<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public const CREATED_AT = 'creation_date';

    public const UPDATED_AT = null;

    protected $fillable = [
        'author_name',
        'content',
    ];
}
