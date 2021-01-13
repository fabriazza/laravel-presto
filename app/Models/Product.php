<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'user_id'
    ];
     
    public function toSearchableArray()
      {
        
        $array = [
           'id' => $this->id,
           'title' => $this->title,
           'description' => $this->description,
           
        ];
        // Customize the data array...
        return $array;
      }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    static public function ToBeRevisionedCount(){
        return Product::where('is_accepted', null)->count();
    }


}

