<?php
namespace App\Test;

use App\Green;

class GreenTest extends \PHPUnit\Framework\TestCase {
	public function testGreenSaysHello() {
		$green = new Green();
		self::assertStringContainsString(
			"Hello",
			$green->greet()
		);
	}

	public function testGreeterUsesName() {
		$greeter = new Green();

		self::assertStringContainsString(
			"Hello, Cody",
			$greeter->greet("Cody")
		);
		self::assertStringContainsString(
			"Hello, Sarah",
			$greeter->greet("Sarah")
		);
	}
}
