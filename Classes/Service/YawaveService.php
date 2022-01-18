<?php
namespace Interspark\YawavePublications\Service;

use Interspark\YawavePublications\Domain\Repository\YawaveConnectionRepository;
use Interspark\YawavePublications\Domain\Model\YawaveConnection;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class YawaveService {
	
	public function __construct(YawaveConnectionRepository $yawaveConnectionRepository) {
		
		$this->yawaveConnectionRepository = $yawaveConnectionRepository;
		
		$creds = $this->yawaveConnectionRepository->findByUid(1);
		
		$this->api_key = $creds->getApiKey();
		$this->api_secret = $creds->getApiSecret();
		$this->application_id = $creds->getApplicationId();
		$this->api_mode = $creds->getApiUrl();
		
		$this->api_sso_key = $creds->getApiSsoKey();
		
		$this->storgae_pid = $creds->getYawaveStoragePid();
		
		
		$this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		$this->configurationManager = $this->objectManager->get(
			ConfigurationManagerInterface::class
		);
		$curentPageid = (int)GeneralUtility::_GET('id');

		if(!is_null($this->storgae_pid)) {
			$this->configurationManager->setConfiguration(
				[
					'persistence' => [
						'storagePid' => $this->storgae_pid
					],
				]
			);
		}else{
			$this->configurationManager->setConfiguration(
				[
					'persistence' => [
						'storagePid' => $curentPageid
					],
				]
			);
		}
		
	}
	
	public function set_api_token_and_app_id() {
		
		$key 			= $this->api_key;
		$secret			= $this->api_secret;
		$this->app_id 	= $this->application_id;
		
		
		if($this->api_mode == 'prod') {
			$this->api_domain_url = 'yawave.com';
		}elseif($this->api_mode == 'dev') {
			$this->api_domain_url = 'test-yawave.com';
		}
		
		
		$data = array (
			'grant_type' => $this->app_id
		);
		
		
		
		$additionalHeaders = "";
		$ch = curl_init('https://sso.'.$this->api_domain_url.'/auth/realms/'.$this->api_sso_key.'/protocol/openid-connect/token');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', $additionalHeaders));
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_USERPWD, $key . ":" . $secret);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$return = curl_exec($ch);
		$response = json_decode($return);
		if ($response && isset($response->access_token) && !empty($response->access_token)) {
			$this->token = $response->access_token;
		}
		
		
		
		curl_close($ch);
		
	}
	
	public function get_api_endpoint_data($url, $params = [], $put_method = '') {
		
		$url = str_replace("yawave.com", $this->api_domain_url, $url);
		$url = str_replace("YAWAVE_APP_ID", $this->app_id, $url);
		
		$header = array(
			"Authorization: Bearer {$this->token}",
			'Content-Type: application/json'
		);
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		if($put_method == 'PUT') {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');	
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		}
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		return json_decode($response);
		
	}
	
	public function yawave_convertYoutube($string) {
		return preg_replace(
		"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		"<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen style='width: 100%; height: 450px; border:0;' class='yawave-youtube-embeded'></iframe>",
		$string
		);
	  }

	public function slugify($text) {
		  // replace non letter or digits by -
		  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

		  // transliterate
		  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		  // remove unwanted characters
		  $text = preg_replace('~[^-\w]+~', '', $text);

		  // trim
		  $text = trim($text, '-');

		  // remove duplicate -
		  $text = preg_replace('~-+~', '-', $text);

		  // lowercase
		  $text = strtolower($text);

		  if (empty($text)) {
		  return 'n-a';
		  }

		  return $text;
	}
	
	public function get_publication_details_page_id() {
		
		return $this->yawaveConnectionRepository->findByUid(1)->getPublicationDetailsPageUid();
		
	}
	
	public function getApiDomain() {
		
		if($this->api_mode == 'prod') {
			return 'yawave.com';
		}elseif($this->api_mode == 'dev') {
			return 'test-yawave.com';
		}
		
	}
	
	public function getApiAppId() {
		
		return $this->application_id;
		
	}
	
}
