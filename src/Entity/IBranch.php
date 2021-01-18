<?php

declare(strict_types=1);

namespace Baraja\Zasilkovna\Entity;


interface IBranch
{
	/**
	 * @param mixed[] $data
	 */
	public function __construct(array $data);

	public function getName(): string;

	public function getLabelRouting(): string;

	public function getLatitude(): float;

	public function getLongitude(): float;

	public function getDistanceFrom(float $latitude, float $longitude): float;
}
