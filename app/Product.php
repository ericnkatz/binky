<?php namespace BustedBinky;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cache, Amazon, Etsy;

class Product extends Model {

	protected $appends = ['error'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';


	protected $guarded = [];

	protected $hidden = [];

	public function __construct($attributes = array())  {

        $this->result = $this->grabResults();

        parent::__construct($attributes);
    }

	public function getPriceAttribute($value)
	{
		// if($this->stale()) {
		// 	$result = $this->grabResults();
		// 	if($result && array_key_exists('price', $result)) {
		// 		$this->price = (int) $result['price'];
		// 		$this->save();
		// 	}
		// }

		return $value;
	}

	public function getErrorAttribute()
	{
		if($this->result && array_key_exists('error', $this->result)) {
			Cache::forget('amazn__'.md5($this->name));
			return $this->attributes['error'] = $this->result;
		}

		return false;
	}

	public function getLinkAttribute($value)
	{	
		if($this->result && array_key_exists('url', $this->result)) {
			return $this->attributes['link'] = $this->result['url'];
		}
		
		return $value;
	}

	public function isAmazon()
	{
		return $this->type == 'amazon';
	}

	public function isEtsy()
	{
		return $this->type == 'etsy';
	}	

	public function grabResults()
	{
		$product = $this;

		$result = false;
		if($this->isAmazon()) {
			$result = Amazon::search($this->identifier);
			
			return $result;
			
			$result = Cache::remember('amazo__'.md5($this->name), 1440, function() use ($product) { 		
				
				$amazon = Amazon::search($this->identifier);

				if(isset($amazon['error'])) {

					$newAmazon = Amazon::search($this->name);

					if(isset($newAmazon['error']['Items']['TotalResults']) && $newAmazon['error']['Items']['TotalResults'] < 1) {
						$this->live = false;
						$this->update();
					}

				}

			});
		}


		if($this->isEtsy()) {
			$result = Cache::remember('amazo__'.md5($this->name), 1440, function() use ($product) { 		
				
				$etsy = Etsy::search($this->identifier);

				return $etsy;

			});

		}
		return $result;

	}
	public function stale()
	{
		return $this->updated_at->lt(Carbon::now()->subMinutes(50));
	}
	
	public function categories()
	{
		return $this->belongsToMany('BustedBinky\Category', 'category_product');
	}
}
