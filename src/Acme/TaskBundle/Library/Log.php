<?php
namespace Acme\TaskBundle\Library;
use Symfony\Bridge\Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log{
	public static function err($file,$message) {
		$logger = new Logger($file);
		$logger->pushHandler(new StreamHandler(__DIR__.'/../../../../app/logs/customerr.log', Logger::WARNING));
		$logger->addError($message);
	}
	public static function bench($file,$start,$function) {
		$time = microtime() - $start;
		$message = $function.': '.$time;		
		$logger = new Logger($file);
		$logger->pushHandler(new StreamHandler(__DIR__.'/../../../../app/logs/bench.log', Logger::WARNING));
		$logger->addError($message);
	}
	public static function log($file,$message) {
		$logger = new Logger($file);
		$logger->pushHandler(new StreamHandler(__DIR__.'/../../../../app/logs/'.$file.'.log', Logger::WARNING));
		$logger->addError($message);
	}
}