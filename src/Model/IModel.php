<?php

declare(strict_types=1);

namespace Baraja\Zasilkovna\Model;


interface IModel
{
	public function toArray(): iterable;
}
