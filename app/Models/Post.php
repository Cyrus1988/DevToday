<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public const CREATED_AT = 'creation_date';

    public const UPDATED_AT = null;

    protected $fillable = [
        'title',
        'link',
        'amount_of_upvotes',
        'author_name'
    ];
}
