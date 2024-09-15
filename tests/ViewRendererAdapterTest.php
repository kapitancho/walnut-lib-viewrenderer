<?php

use PHPUnit\Framework\TestCase;
use Walnut\Lib\TemplateRenderer\TemplateRenderer;
use Walnut\Lib\ViewRenderer\LookupViewMapper;
use Walnut\Lib\ViewRenderer\ViewRendererAdapter;

final class ViewRendererAdapterTest extends TestCase {

	public function testOk(): void {
		$viewRenderer = new ViewRendererAdapter(
			new class implements TemplateRenderer {
				public function canRenderTemplate(string $templateName): bool {
					return true;
				}
				public function render(string $templateName, mixed $viewModel = null): string {
					ViewRendererAdapterTest::assertEquals('my-template', $templateName);
					return 'my-result';
				}
			},
			new LookupViewMapper([self::class => 'my-template'])
		);
		self::assertEquals('my-result', $viewRenderer->render($this));
	}

}