<?php
namespace Acme\TaskBundle\Library;
use Symfony\Bridge\Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log{
	public static function err($file,$message) {
		$logger = new Logger($file);
		$logger->pushHandler(new StreamHandler('/var/www/html/Symfony/app/logs/custom.log', Logger::WARNING));
		$logger->addError($message);
	}
}