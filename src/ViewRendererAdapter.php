<?php

namespace Walnut\Lib\ViewRenderer;

use Walnut\Lib\HttpMapper\ViewRenderer;
use Walnut\Lib\TemplateRenderer\TemplateRenderer;

final class ViewRendererAdapter implements ViewRenderer {
	public function __construct(
		private readonly TemplateRenderer $templateRenderer,
		private readonly ViewMapper $viewMapper,
	) {}

	public function render(object $view): string {
		return $this->templateRenderer->render(
			$this->viewMapper->findTemplate($view::class),
			$view
		);
	}
}