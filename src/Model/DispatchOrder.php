<?php

declare(strict_types=1);

namespace Baraja\Zasilkovna\Model;


class DispatchOrder implements IModel
{
	private mixed $goods;

	private mixed $pdf;


	public function __construct(mixed $goods, mixed $pdf)
	{
		$this->goods = $goods;
		$this->pdf = $pdf;
	}


	public function getGoods(): mixed
	{
		return $this->goods;
	}


	public function setGoods(mixed $goods): void
	{
		$this->goods = $goods;
	}


	public function getPdf(): mixed
	{
		return $this->pdf;
	}


	public function setPdf(mixed $pdf): void
	{
		$this->pdf = $pdf;
	}


	public function toArray(): iterable
	{
		return get_object_vars($this);
	}
}
