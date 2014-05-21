<?php
namespace rekin\core;

class path {

	public  $root,
			$system,
			$config,
			$log,
			$controller,
			$model,
			$template,
			$image,
			$css;

	public function __construct ( ) {
		$this->root = dirname ( dirname ( __DIR__ ) )."/";
		$this->system = $this->root."system/";
		$this->log = $this->system."log/";
		$this->config = $this->system."config/";
		$this->controller = $this->system."module/controller/";
		$this->model = $this->system."module/model/";
		$this->template = $this->system."template/";
		$this->image = $this->template."image/";
		$this->css = $this->template."css/";
	}

}
