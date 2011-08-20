<?php

class php_net_Socket {
	public function __construct($s) {
		if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("php.net.Socket::new");
		$製pos = $GLOBALS['%s']->length;
		$this->__s = $s;
		$this->input = new php_io_FileInput($this->__s);
		$this->output = new php_io_FileOutput($this->__s);
		$this->protocol = "tcp";
		$GLOBALS['%s']->pop();
		unset($製pos);
	}}
	public $__s;
	public $input;
	public $output;
	public $custom;
	public $protocol;
	public function assignHandler() {
		$GLOBALS['%s']->push("php.net.Socket::assignHandler");
		$製pos = $GLOBALS['%s']->length;
		$this->input->__f = $this->__s;
		$this->output->__f = $this->__s;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function close() {
		$GLOBALS['%s']->push("php.net.Socket::close");
		$製pos = $GLOBALS['%s']->length;
		fclose($this->__s);
		{
			$this->input->__f = null;
			$this->output->__f = null;
			;
		}
		$this->input->close();
		$this->output->close();
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function read() {
		$GLOBALS['%s']->push("php.net.Socket::read");
		$製pos = $GLOBALS['%s']->length;
		$b = "";
		while (!feof($this->__s)) $b .= fgets($this->__s);
		{
			$GLOBALS['%s']->pop();
			return $b;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$b);
	}
	public function write($content) {
		$GLOBALS['%s']->push("php.net.Socket::write");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = fwrite($this->__s, $content);
			$GLOBALS['%s']->pop();
			$裨mp;
			return;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function connect($host, $port) {
		$GLOBALS['%s']->push("php.net.Socket::connect");
		$製pos = $GLOBALS['%s']->length;
		$errs = null;
		$errn = null;
		$r = stream_socket_client(((($this->protocol . "://") . $host->_ip) . ":") . $port, $errn, $errs);
		php_net_Socket::checkError($r, $errn, $errs);
		$this->__s = $r;
		$this->assignHandler();
		$GLOBALS['%s']->pop();
		unset($製pos,$r,$errs,$errn);
	}
	public function listen($connections) {
		$GLOBALS['%s']->push("php.net.Socket::listen");
		$製pos = $GLOBALS['%s']->length;
		;
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	public function shutdown($read, $write) {
		$GLOBALS['%s']->push("php.net.Socket::shutdown");
		$製pos = $GLOBALS['%s']->length;
		$r = null;
		if(function_exists("stream_socket_shutdown")) {
			$rw = php_net_Socket_0($this, $r, $read, $write);
			$r = stream_socket_shutdown($this->__s, $rw);
			unset($rw);
		}
		else {
			$r = fclose($this->__s);
			;
		}
		php_net_Socket::checkError($r, 0, "Unable to Shutdown");
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function bind($host, $port) {
		$GLOBALS['%s']->push("php.net.Socket::bind");
		$製pos = $GLOBALS['%s']->length;
		$errs = null;
		$errn = null;
		$r = stream_socket_server(((($this->protocol . "://") . $host->_ip) . ":") . $port, $errn, $errs, php_net_Socket_1($this, $errn, $errs, $host, $port));
		php_net_Socket::checkError($r, $errn, $errs);
		$this->__s = $r;
		$this->assignHandler();
		$GLOBALS['%s']->pop();
		unset($製pos,$r,$errs,$errn);
	}
	public function accept() {
		$GLOBALS['%s']->push("php.net.Socket::accept");
		$製pos = $GLOBALS['%s']->length;
		$r = stream_socket_accept($this->__s);
		php_net_Socket::checkError($r, 0, "Unable to accept connections on socket");
		{
			$裨mp = new php_net_Socket($r);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function hpOfString($s) {
		$GLOBALS['%s']->push("php.net.Socket::hpOfString");
		$製pos = $GLOBALS['%s']->length;
		$parts = _hx_explode(":", $s);
		if($parts->length === 2) {
			{
				$裨mp = _hx_anonymous(array("host" => new php_net_Host($parts[0]), "port" => Std::parseInt($parts[1])));
				$GLOBALS['%s']->pop();
				return $裨mp;
				unset($裨mp);
			}
			;
		}
		else {
			{
				$裨mp = _hx_anonymous(array("host" => new php_net_Host(_hx_substr($parts[1], 2, null)), "port" => Std::parseInt($parts[2])));
				$GLOBALS['%s']->pop();
				return $裨mp;
				unset($裨mp);
			}
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$parts);
	}
	public function peer() {
		$GLOBALS['%s']->push("php.net.Socket::peer");
		$製pos = $GLOBALS['%s']->length;
		$r = stream_socket_get_name($this->__s, true);
		php_net_Socket::checkError($r, 0, "Unable to retrieve the peer name");
		{
			$裨mp = $this->hpOfString($r);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function host() {
		$GLOBALS['%s']->push("php.net.Socket::host");
		$製pos = $GLOBALS['%s']->length;
		$r = stream_socket_get_name($this->__s, false);
		php_net_Socket::checkError($r, 0, "Unable to retrieve the host name");
		{
			$裨mp = $this->hpOfString($r);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function setTimeout($timeout) {
		$GLOBALS['%s']->push("php.net.Socket::setTimeout");
		$製pos = $GLOBALS['%s']->length;
		$s = intval($timeout);
		$ms = intval(($timeout - $s) * 1000000);
		$r = stream_set_timeout($this->__s, $s, $ms);
		php_net_Socket::checkError($r, 0, "Unable to set timeout");
		$GLOBALS['%s']->pop();
		unset($製pos,$s,$r,$ms);
	}
	public function setBlocking($b) {
		$GLOBALS['%s']->push("php.net.Socket::setBlocking");
		$製pos = $GLOBALS['%s']->length;
		$r = stream_set_blocking($this->__s, $b);
		php_net_Socket::checkError($r, 0, "Unable to block");
		$GLOBALS['%s']->pop();
		unset($製pos,$r);
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->蜿ynamics[$m]) && is_callable($this->蜿ynamics[$m]))
			return call_user_func_array($this->蜿ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static function newUdpSocket() {
		$GLOBALS['%s']->push("php.net.Socket::newUdpSocket");
		$製pos = $GLOBALS['%s']->length;
		$s = new php_net_Socket(null);
		$s->protocol = "udp";
		{
			$GLOBALS['%s']->pop();
			return $s;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$s);
	}
	static function newSslSocket() {
		$GLOBALS['%s']->push("php.net.Socket::newSslSocket");
		$製pos = $GLOBALS['%s']->length;
		$s = new php_net_Socket(null);
		$s->protocol = "ssl";
		{
			$GLOBALS['%s']->pop();
			return $s;
			;
		}
		$GLOBALS['%s']->pop();
		unset($製pos,$s);
	}
	static function checkError($r, $code, $msg) {
		$GLOBALS['%s']->push("php.net.Socket::checkError");
		$製pos = $GLOBALS['%s']->length;
		if(!$r === false) {
			$GLOBALS['%s']->pop();
			return;
			;
		}
		throw new HException(haxe_io_Error::Custom((("Error [" . $code) . "]: ") . $msg));
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	static function getType($isUdp) {
		$GLOBALS['%s']->push("php.net.Socket::getType");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = php_net_Socket_2($isUdp);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	static function getProtocol($protocol) {
		$GLOBALS['%s']->push("php.net.Socket::getProtocol");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = getprotobyname($protocol);
			$GLOBALS['%s']->pop();
			return $裨mp;
			unset($裨mp);
		}
		$GLOBALS['%s']->pop();
		unset($製pos);
	}
	function __toString() { return 'php.net.Socket'; }
}
;
function php_net_Socket_0(&$裨his, &$r, &$read, &$write) {
	$GLOBALS['%s']->push('php.net.Socket:lambda_0');
	$製pos = $GLOBALS['%s']->length;
if($read && $write) {
	return 2;
	;
}
else {
	return (php_net_Socket_3($r, $read, $write));
	;
}
}
function php_net_Socket_1(&$裨his, &$errn, &$errs, &$host, &$port) {
	$GLOBALS['%s']->push('php.net.Socket:lambda_1');
	$製pos = $GLOBALS['%s']->length;
if($裨his->protocol === "udp") {
	return STREAM_SERVER_BIND;
	;
}
else {
	return STREAM_SERVER_BIND | STREAM_SERVER_LISTEN;
	;
}
}
function php_net_Socket_2(&$isUdp) {
	$GLOBALS['%s']->push('php.net.Socket:lambda_2');
	$製pos = $GLOBALS['%s']->length;
if($isUdp) {
	return SOCK_DGRAM;
	;
}
else {
	return SOCK_STREAM;
	;
}
}
function php_net_Socket_3(&$r, &$read, &$write) {
	$GLOBALS['%s']->push('php.net.Socket:lambda_3');
	$製pos = $GLOBALS['%s']->length;
if($write) {
	return 1;
	;
}
else {
	return (php_net_Socket_4($r, $read, $write));
	;
}
}
function php_net_Socket_4(&$r, &$read, &$write) {
	$GLOBALS['%s']->push('php.net.Socket:lambda_4');
	$製pos = $GLOBALS['%s']->length;
if($read) {
	return 0;
	;
}
else {
	return 2;
	;
}
}