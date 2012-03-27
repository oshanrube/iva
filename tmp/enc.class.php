<?php
class ENC{
	private $blockSize = 32;
	private $key;
	private $blankCount = 0;
	public function __construct($key){
		//encript key to md5 to convert hex
		$this->key = md5($key);
	}
	
	public function encrypt($text,$base64 = false) {
		//replace ascii new line for encription
		$text = $this->normalizeText($text,true);
		//split the text into 32 bit blocks
		$blocks = $this->splitToArray ($text,32);
		$blocks = $this->fillBlanks($blocks);
		//reverse the order of the block {permutation}
		$blocks = $this->permute($blocks);
		//reverse the array for futher permutation
		if(count($blocks)%2 == 0){ $blocks = array_reverse($blocks);
		} else { 
			$tmp_block = array_pop($blocks);
			$blocks = array_reverse($blocks);
			array_push($blocks,$tmp_block); 
		}
		$str = "";
		//foreach block
		foreach($blocks as $block){
			//permute the text inside the block
			$block = $this->permuteBlock($block);
			//foreach letter of the block
			for($x = 0;$x < strlen($block); $x++){
				//substitute the alphabet with qwerty keyboard
				$char = $this->substitute($block{$x}, true);
				//get the character from the key
				$amount = hexdec($this->key{$x});
				//shift the char by the key {transposition}
				//also returns the asii value of the character
				$char = $this->shiftPos($char,$amount);
				//convert to dec
				$char = ord($char);
				//change the number base decimal to hex 
				$char = dechex($char);
				//xor with key {xor}
				$char = $this->convXOR($char,$this->key);
				//convert the encording {substitution}
				$char = mb_convert_encoding($char,'ASCII','utf8');
				//convert to ascii 
				$str .= $char;
			}
		}
		
		if($base64) return '1'.base64_encode($str).$this->blankCount;
		else return '0'.$str.$this->blankCount;
	}
	
	public function decrypt($text) {
		//get blanks
		$this->blankCount = substr( $text, -2 );
		//remove blanks
		$text = substr( $text, 0, -2 );
		//is base 64?
		$text = $this->conBase64($text);
		//split the text into 2 bit blocks
		$blocks = $this->splitToArray($text,2);//str_split($text,2);
		
		$count = 0;
		$str = "";
		//foreach block
		foreach($blocks as $block){
			//convert the encording back
			$char = mb_convert_encoding($block,'utf8','ASCII');
			//xor
			$char = $this->convXOR($char,$this->key);
			//hex to decimal
			$char = hexdec($char);
			//convert ascii to char
			$char = chr($char);
			//get the character from the key
			$amount = hexdec($this->key{$count});
			//shift the char by the key {transposition}
			$char = $this->shiftPos($char,$amount,false);
			//substitute the alphabet with qwerty keyboard
			$char = $this->substitute($char, false);
			$str .= $char;
			
			if($count == 31){$count=0;}
			else {$count++;}
		}
		//split the text into 32 bit blocks
		$blocks = $this->splitToArray($str,32);
		//reverse the array for further permutation
		if(count($blocks)%2 == 0) $blocks = array_reverse($blocks);
		else { 
			$tmp_block = array_pop($blocks);
			$blocks = array_reverse($blocks);
			array_push($blocks,$tmp_block); 
		}
		//jumble the order of the block {permutation}
		$blocks = $this->permute($blocks,false);
		//reverse permute the text inside the blocks
		for($x = 0; $x < count($blocks); $x++) {
			$blocks[$x] = $this->permuteBlock($blocks[$x]);
		}
		//remove blanks
		$blocks = $this->removeBlanks($blocks);
		//implode the blocks
		$text = implode('',$blocks);
		return $this->normalizeText($text,false);
	}
	
	private function convXOR($char,$key) {
		$text = "";
		for($i=0;$i<strlen($char);$i++)
	 	{
			$text .= $char{$i} ^ $key{$i};
		}
		return $text;
	}
	
	private function shiftPos($string,$amount,$enc = true) {
		if($enc) {
			if((ord($string) + $amount) > 240){echo "Characters are not supported by php";exit();}
			return chr(ord($string) + $amount);
		} else {
			return chr(ord($string) - $amount);
		} 
	}
	
	private function conBase64($text){
		//if 1st bit is 1 its base 64
		if( substr( $text,0, 1 ) == 1 ){
			return base64_decode(substr( $text, 1 ));
		} else {
			return substr( $text, 1 );
		}
	}
	
	private function permute($array,$enc = true) {
		$arr1 = array();
		$arr2 = array();
		if($enc){
			foreach($array as $key => $text){
				if($key%2 == 0) // get odd lines and push to a array
					$arr1[] = $text;
				else //get even numbered lines and push to another array
					$arr2[] = $text;
			}
			return array_merge($arr1,$arr2);
		} else {
			$finalArray = array();
			$len = round(count($array)/2);
			//split the array in half
			$arr1 = array_slice($array,0,$len);
			$arr2 = array_slice($array,$len);
			for($x = 0; $x < $len; $x++){
				if(isset($arr1[$x]))$finalArray[] = $arr1[$x];
				if(isset($arr2[$x]))$finalArray[] = $arr2[$x];
			}
			return $finalArray;
		}
	}
	
	private function permuteBlock($block) {
		//get the 32 bit string and split into two 16 bit arrays
		$twoBlocks = str_split( $block, ($this->blockSize/2) );
		//for each block
		foreach($twoBlocks as $blck) {
			//loop through the string
			for($x = 0; $x < strlen($blck); $x++ ) {
				//split into multidimention array
				$coloumn = $x % 4;
				$table[$coloumn][] = $blck{$x};
			}
			//remerge the columns
			foreach($table as $column){
				$columns[] = implode('', $column);
			}
			$tables[] = implode('',$columns);unset($columns);unset($table);
		}
		//merge the two columns
		return implode('', $tables);
	}
	
	private function fillBlanks($blocks) {
		$str="";
		$lastKey = $blocks[count($blocks)-1];
		for( $x = 0; $x < $this->blockSize; $x++){
			if(isset($lastKey{$x})){
				$str .= $lastKey{$x};
			} else {
				$str .= 0;
				$this->blankCount++;
			}
		}
		if($this->blankCount < 16) $this->blankCount = "0".dechex($this->blankCount);
		else $this->blankCount = dechex($this->blankCount);
		//reset the last array
		$blocks[count($blocks)-1] = $str; 
		return $blocks;
	}
	
	private function removeBlanks($blocks) {
		$lastKey = $blocks[count($blocks)-1];
		$str = substr($lastKey,0,($this->blockSize-hexdec($this->blankCount)));
		//reset the last array
		$blocks[count($blocks)-1] = $str; 
		return $blocks;
	}
	
	private function substitute($text, $enc = true) {
		$qwerty 		= 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789';
  		$alphabet 	= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		if($enc) {
			return strtr($text, $qwerty, $alphabet);
		} else {
  			return strtr($text, $alphabet, $qwerty);
  		}
	}
	
	private function splitToArray ($str,$length) {
		if (empty($str)) return false;
		preg_match_all("/.{".$length."}/imUxs",$str, $blocks);
		if(strlen($str) % $length != 0 ){
			//$len = count($blocks[0])*$length;
			//$blocks[0][] = preg_replace("/.{".$len."}/is","",$str);
			$len = strlen($str) % $length;
			$blocks[0][] = substr($str, -$len);
		}
		return $blocks[0];
	}
	
	private function normalizeText($text, $enc = true) {
		if($enc) //replace ascii new line character
			return preg_replace("/\n/s",'\n',$text);
		else //replace ascii new line character
			return preg_replace("/\\\\n/","\n",$text);
	}
}