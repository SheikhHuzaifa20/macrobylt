<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders_products extends Model
{
	protected $table = 'orders_products';
	public $primaryKey = 'orders_products_id';

	public function audio()
	{
		return $this->belongsTo(\App\Models\Audio_gallery::class, 'order_products_product_id');
	}
    

}
