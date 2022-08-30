<?php
namespace App;

class Green {
	public function greet(string $name = null):string {
		if($name) {
			return "Hello, $name!";
		}

		return "Hello!";
	}
}
