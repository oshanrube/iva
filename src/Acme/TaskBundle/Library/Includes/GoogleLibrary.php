<?php
namespace Acme\TaskBundle\Library\Includes;
use Acme\TaskBundle\Library\Log;

class GoogleLibrary{

		private $query,$cachePath;
		public $search_addr,$correct;

		public function __construct(){
			$this->cachePath = __DIR__.'/../../../../../app/cache/app/';
			$this->search_addr = 'http://www.google.com/search?hl=en-US&q=#QUERY#&meta=';
		}

		public function search($query){
				$this->query = $query;
				//MAKE ADDRESS
				if($resultado = $this->getCache($query)){
					if($resultado == "") return false;
				} else {
					//$resultado = file_get_contents(str_replace('#QUERY#',urlencode($this->query),$this->search_addr));
					$url = str_replace('#QUERY#',urlencode($this->query),$this->search_addr);
					//curl 
					$curl = curl_init();
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl, CURLOPT_URL, $url);
					$resultado = curl_exec($curl);
					curl_close($curl);
					
					if($resultado == "") return false;					$this->addCache($query,$resultado);
				}
				
				// initialize DOM
				$doc = new \DOMDocument;
				@$doc->loadHTML($resultado);
				
				$aTag = $doc->getElementByID('ires')->getElementsByTagName('div');
				if($aTag->length == 0)return false;
				if(preg_match("/Did you mean: /",$aTag->item(0)->nodeValue)){
					$this->correct = str_replace("Did you mean: ",'',$aTag->item(0)->nodeValue );
					if($this->correct){return true;}
				} elseif(preg_match("/Search instead for/",$aTag->item(0)->nodeValue)){
					$this->correct = preg_replace("/Showing results for (.*). Search instead for.*/",'$1',$aTag->item(0)->nodeValue );
					if($this->correct){return true;}
				}				 
				//RETURNS
				return false;
		}
		
		private function getCache($query) {
			$filename = base64_encode(md5($query)).'.ggl';
			if(file_exists($this->cachePath.$filename)) {
				return unserialize(file_get_contents($this->cachePath.$filename));
			}
			return false;
		}
		
		private function addCache($query,$data) {
			$filename = base64_encode(md5($query)).'.ggl';
			$fp = fopen($this->cachePath.$filename,"w+");
					fwrite($fp,serialize($data));
					fclose($fp);
		}
}