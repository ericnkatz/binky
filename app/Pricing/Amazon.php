<?php namespace BustedBinky\Pricing;

use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Search;
use ApaiIO\ApaiIO;

class Amazon extends Pricing {
	protected $config;
	protected $amazon;

	function __construct() {
		$config = new GenericConfiguration;
		$config->setCountry('com')
				->setAccessKey('###################')
				->setSecretKey('###################')
				->setAssociateTag('bustedbinky-20');

		$this->config = $config;
		
		$amazon = new ApaiIO($this->config);

		$this->provider = $amazon;

	}


	public function findId(String $url)
	{

		$amazonPattern = '/gp\/product\/(.*)\//';
		preg_match($amazonPattern, $url, $amazonProductId);

		if(isset($amazonProductId[1])) {
			return $amazonProductId[1];
		}

		return false;
	}

	public function search($keywords) {
		$search = new Search();
		$search->setCategory('All');
		$search->setResponseGroup(array('Large', 'Small', 'Reviews'));
		$search->setKeywords($keywords);

		$result = $this->provider->runOperation($search);

		$result = json_decode(json_encode(simplexml_load_string($result)),1);

		return $this->buildResponse($result);
		//$formattedResponse = $apaiIO->runOperation($search);
	}

	function buildResponse($result)
	{
		$response = [];
		if(isset($result['Items']['Request']['IsValid']) && $result['Items']['TotalResults'] > 0) {
			
			if(isset($result['Items']['Item'])){
				$item = $result['Items']['Item'];
			} else {
				$item = false;
			}
			

			$response['url'] = isset($item['DetailPageURL']) ? $item['DetailPageURL'] : '';;

			$response['identifier'] = isset($item['ASIN']) ? $item['ASIN'] : null;
			if(isset($item['OfferSummary']['LowestNewPrice']['Amount'])) {
				$response['price'] = $item['OfferSummary']['LowestNewPrice']['Amount'];
			}
		//	$response = $item;
		} else {
			$response['error'] = isset($result['Items']) ? $result['Items']['Request']['Errors']['Error']['Message'] : $result['Error']['Message'];
		}
		return $response;
	}
}