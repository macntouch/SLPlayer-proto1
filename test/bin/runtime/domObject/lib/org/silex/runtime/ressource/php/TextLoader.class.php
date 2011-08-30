<?php

class org_silex_runtime_ressource_php_TextLoader extends org_silex_runtime_ressource_RessourceLoader {
	public function __construct() { if( !php_Boot::$skip_constructor ) {
		$GLOBALS['%s']->push("org.silex.runtime.ressource.php.TextLoader::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
		unset($�spos);
	}}
	public function doLoad($relativeUrl) {
		$GLOBALS['%s']->push("org.silex.runtime.ressource.php.TextLoader::doLoad");
		$�spos = $GLOBALS['%s']->length;
		$port = $_SERVER["SERVER_PORT"];
		$absoluteUrl = (((("http://" . $_SERVER['SERVER_NAME']) . ":") . $port) . php_Web::getURI()) . $relativeUrl;
		parent::doLoad($absoluteUrl);
		$GLOBALS['%s']->pop();
		unset($�spos,$port,$absoluteUrl);
	}
	public function onLoadComplete($data) {
		$GLOBALS['%s']->push("org.silex.runtime.ressource.php.TextLoader::onLoadComplete");
		$�spos = $GLOBALS['%s']->length;
		$domObject = new org_silex_runtime_domobject_php_TextDOMObject(Xml::createElement("div"));
		$domObject->setText($data);
		$this->_onLoadCompleteCallback($domObject);
		$GLOBALS['%s']->pop();
		unset($�spos,$domObject);
	}
	function __toString() { return 'org.silex.runtime.ressource.php.TextLoader'; }
}
