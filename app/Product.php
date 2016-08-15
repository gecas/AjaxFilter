<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'title',
		'slug',
		'price',
		'size',
		'image_name',
		'image_path',
		'category_id',
		'color_id'
	];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function color()
    {
    	return $this->belongsTo(Color::class);
    }
}
