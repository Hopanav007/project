<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class ItemCategory extends Model
{
    use NodeTrait;

    protected $table = 'items_categories';

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'hidden',
    ];
}
