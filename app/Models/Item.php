<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    // $items = Item::paginate(5);
    // $items = Item::where('id', '>',1)->paginate(
    //     $perPage = 5, $columns = ['*'], $pageName = 'items'
    // );
    }
}
