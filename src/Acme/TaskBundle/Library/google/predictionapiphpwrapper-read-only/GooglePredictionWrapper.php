<?php
/*
 * @author: David McNelis <dmcnelis@entunne.com>
 * @company: enTunne LLC
 * @website: entunne.com
 * @license: Apache License 2.0
 * @link: https://predictionapiphpwrapper.googlecode.com/
 * This class assumes that you have already successfully retrieved an authorization
 * code through GoogleLogin.php, also a part of this project.
 */
class GooglePrediction{
	private $_authCode;
	public $bucket = "entunne";
	public $object;
	public $parsedPredictionData;
	private $predictionType;
	public $debug;
	/*
	 * __construct($authCode)
	 * __construct($authCode, $bucket)
	 * __construct($authCode, $bucket, $object)
	 */
	function __construct(){
		$numArgs = func_num_args();
		$args = func_get_args();
		if($numArgs>0){
			$this->_authCode = $args[0];
		}
		if($numArgs>1){
			$this->bucket = $args[1];
		}
		if($numArgs>2){
			$this->object = $args[2];
		}
	}
	
	public function setAuthCode($authCode){
		$this->_authCode = $authCode;
	}
	
	/*
	 * 
	 * Returns data response, on success the response will be
	 * your bucket and object on success, otherwise returns the error message from 
	 * the API.
	 */
	public function invokeTraining(){
		
		$success = "SUCCESS";
		
		$url =  "https://www.googleapis.com/prediction/v1.1/training?data=".$this->bucket."%2F".$this->object;

		$header = array('Content-Type:application/json',
				'Authorization: GoogleLogin auth='.$this->_authCode);

		$data = array();
		$jsonData = json_encode($data);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = json_decode(curl_exec($ch));
		if(!$response->{'data'}->{'data'}==$this->bucket."/".$this->object){
			$success = $response->{'data'}->{'data'};
		}

		error_log("Training invocation result: ". $success);	

		return $success;

	}

	/*
	 * 
	 * Returns model info and bucket/object information
	 */
	public function getTrainingStatus(){

		$url =  "https://www.googleapis.com/prediction/v1.1/training/".$this->bucket."%2F".$this->object;
	
		$header = array('Authorization: GoogleLogin auth='.$this->_authCode);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = json_decode(curl_exec($ch));
		error_log("Training response: " .$response->{'data'}->{'data'}."-".$response->{'data'}->{'modelinfo'});
		return $response->{'data'};
	}

	/*
	 * 
	 * $submission -- data to request prediction for, an array of values
	 * 
	 * Sets prediction variable returned by either:
	 * GooglePrediction::getSingleCategoryPrediction(),
	 * GooglePrediction::getMultiCategoryPrediction() or
	 * GooglePrediction::getRegressionPrediction()
	 * 
	 */
	public function getAllPrediction($submission){

		$url =  "https://www.googleapis.com/prediction/v1.1/training/".$this->bucket."%2F".$this->object."/predict";

		
		$header = array('Content-Type:application/json',
				'Authorization: GoogleLogin auth='.$this->_authCode);
		
		$submissionType = "mixture";
		
		$data = "{\"data\" : { \"input\" : {\"$submissionType\" : [ ";
		
		$firstIteration = true;
		foreach($submission as $element){
			if(is_numeric($element)){
				if($firstIteration){
					$data .= $element;
					$firstIteration = false;
				}else{
					$data .= ", ".$element;
				}
			}else{
				if($firstIteration){
					$data .= "\"{$element}\"";
					$firstIteration = false;
				}else{
					$data .= ", \"{$element}\"";
				}
			}
		}
		
		$data .= " ] }}}";
		
		$this->debug .= $data . "\n";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);
		
		
		$this->parsedPredictionData = json_decode($response);
		
		$this->debug .= $response;
	}
	
	/*
	 * returns the type of prediction that was returned, as of 1.1 of
	 * the Prediction API the possibilities are category or regression.
	 */
	public function getPredictionType(){
		if(is_null($this->parsedPredictionData->{'data'}->{'outputValue'})){
			$this->predictionType="category";
		}else{
			$this->predictionType="regression";
		}
		return $this->predictionType;
	}
	
	/*
	 * Returns the most likely category, as returned by the API
	 */
	public function getSingleCategoryPrediction(){
		return $this->parsedPredictionData->{'data'}->{'outputLabel'};
	}
	
	/*
	 * Returns an array of each possible category and its score.
	 */
	public function getMultiCategoryPrediction(){
		
		return $this->parsedPredictionData->{'data'}->{'outputMulti'};
	}
	
	/*
	 * Returns the value of the regression prediction returned
	 */
	public function getRegressionPrediction(){
		return $this->parsedPredictionData->{'data'}->{'outputValue'};
	}
}

?>