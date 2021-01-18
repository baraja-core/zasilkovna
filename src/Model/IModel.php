<?php

declare(strict_types=1);

namespace Baraja\Zasilkovna\Model;


interface IModel
{
	/**
	 * @return mixed[]
	 */
	public function toArray(): array;
}
