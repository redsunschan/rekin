<?php
namespace rekin\core;

use rekin\api\object;

class path extends object {

	public  $root,
			$system,
			$config,
			$log,
			$controller,
			$model,
			$template,
			$image,
			$css;

	protected function __construct ( ) {
		$this->root = dirname ( dirname ( __DIR__ ) )."/";
		$this->system = $this->root."system/";
		$this->log = $this->system."log/";
		$this->config = $this->system."config/";
		$this->module = $this->system."module/";
		$this->template = $this->system."template/";
		$this->image = $this->template."image/";
		$this->css = $this->template."css/";
	}

}
