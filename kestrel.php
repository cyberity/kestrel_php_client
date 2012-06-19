<?
class Kestrel extends memcache {
	public $key;
	public function __construct($key,$host, $port = 22133)
	{
		$this->key = $key;
		$this->addServer($host, $port);
	}

	public function __call($method,$args){
		$method = strtolower($method);
		switch($method){
			case 'peek':
			case 'abort':
			case 'close':
			case 'open':
				return parent::get("{$this->key}/$method");
			case 'put':
			case 'add':
				return call_user_func_array(array($this,'set'),args);
		}
	}
	public function close(){
		$this->__call('close',array());
	}
	public function addServer($host,$port=22133){
		return parent::addServer($host,$port);
	}
	public function get($reliable=false,$wait=0){
		return parent::get($this->key."/t=$wait".($reliable?'/open':''));
	}
	public function set($value){
		return parent::set($this->key,$value);
	}
    public function next() {
        return parent::get($this->key.'/close/open');
    }
	public function delete() {
		return parent::delete($this->key);
	}
	public function flush() {
		return parent::flush($this->key);
	}
}
