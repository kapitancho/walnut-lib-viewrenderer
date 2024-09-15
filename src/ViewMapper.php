<?php

namespace Walnut\Lib\ViewRenderer;

interface ViewMapper {
	/**
	 * @param class-string $className
	 * @return string
	 * @throws ViewTemplateNotFound
	 */
	public function findTemplate(string $className): string;
}