<?php

class Bootstrap {
	private $controller;
	private $action;
	private $request;

	public function __construct($request) {
		$this->request = $request;
		if($this->request['controller'] == "") {
			$this->controller = 'home';
		} else {
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == "") {
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}
	}

	public function createController() {
		// Check Class
		if (class_exists($this->controller)) {
			$parents = class_parents($this->controller);
			// Check Extend
			if(in_array("Controller", $parents)) {
				if(method_exists($this->controller, $this->action)) {
					return new $this->controller($this->action, $this->request);
				} else {
					// Method Does Not Exist
					echo '<h1>Method does not exits</h1>';
					return;
				}
			} else {
				// Base controller Does not exits
				echo '<h1>Base Controller not found</h1>';
				return;
			}		
		} else {
			// Class Controller Does not exits
			echo '<h1>Class Controller Does not exits</h1>';
			return;
		}
	}
}