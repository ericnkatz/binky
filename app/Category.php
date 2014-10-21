<?php namespace BustedBinky;

use Illuminate\Database\Eloquent\Model;


class Category extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';


	protected $guarded = [];

	protected $hidden = [];

	public function products()
	{
		return $this->belongsToMany('BustedBinky\Product', 'category_product');
	}


}