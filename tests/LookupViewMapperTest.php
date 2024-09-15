<?php

use PHPUnit\Framework\TestCase;
use Walnut\Lib\ViewRenderer\LookupViewMapper;
use Walnut\Lib\ViewRenderer\ViewTemplateNotFound;

final class LookupViewMapperTest extends TestCase {

	public function testOk(): void {
		$mapper = new LookupViewMapper([self::class => 'my-template']);
		self::assertEquals('my-template', $mapper->findTemplate(self::class));
	}

	public function testError(): void {
		$this->expectException(ViewTemplateNotFound::class);
		$mapper = new LookupViewMapper([self::class => 'my-template']);
		self::assertEquals('my-template', $mapper->findTemplate(\stdClass::class));
	}

}