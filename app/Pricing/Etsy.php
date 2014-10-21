<?php namespace BustedBinky\Pricing;

class Etsy extends Pricing {
	
	protected $api_key;

	protected $api_base;


	function __construct()
	{
		$this->api_base = 'https://openapi.etsy.com/v2/';
		$this->api_key = '###################';
	}

	public function search($id)
	{

		$url = $this->api_base . 'listings/' . $id . $this->includeApiKey();
		
		$response = \GuzzleHttp\get($url);
		
		if($response->getBody()) {
			$json = $response->getBody();

			$preview = json_decode($json, true);

			if(isset($preview['count']) && $preview['count']) {
				if($preview['results'][0]['state'] == 'active') {
					if(isset($preview['results'][0]['price'])) {
						$results['price'] = (float) $preview['results'][0]['price'] * 100;
					}
					$results['url'] = $preview['results'][0]['url'];

				} else {
					$results['error'] = $preview['results'][0]['state'] . ' listing';
				}
			} else {
				$results['error'] = 'no listings?';
			}
		}

		return $results;
	}

	public function includeApiKey()
	{
		return '?api_key=' . $this->api_key;
	}

	public function findId(String $url)
	{
		$etsyPattern = '/listing\/(.*)\//';
		preg_match($etsyPattern, $url, $etsyProductId);

		if(isset($etsyProductId[1])) {
			return $etsyProductId[1];
		}

		return false;
	}
}