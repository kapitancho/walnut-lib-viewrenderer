<?php

namespace Walnut\Lib\ViewRenderer;

final class LookupViewMapper implements ViewMapper {

	/**
	 * DI constructor.
	 * @param array<class-string, string> $mapping
	 */
	public function __construct(
		private readonly array $mapping
	) {}

	/**
	 * @param class-string $className
	 * @return string
	 * @throws ViewTemplateNotFound
	 */
	public function findTemplate(string $className): string {
		return $this->mapping[$className] ?? throw new ViewTemplateNotFound($className);
	}

}