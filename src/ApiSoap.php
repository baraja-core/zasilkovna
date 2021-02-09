<?php

declare(strict_types=1);

namespace Baraja\Zasilkovna;


use Baraja\Zasilkovna\Exception\WrongDataException;
use Baraja\Zasilkovna\Model\ClaimAttributes;
use Baraja\Zasilkovna\Model\PacketAttributes;

final class ApiSoap implements IApi
{
	private ?\SoapClient $soap;

	private string $apiKey;


	public function __construct(string $apiKey)
	{
		if (trim($apiKey) === '') {
			throw new \RuntimeException('API key can not be empty.');
		}
		$this->apiKey = $apiKey;
		try {
			$this->soap = new \SoapClient('http://www.zasilkovna.cz/api/soap.wsdl');
		} catch (\Exception $e) {
			throw new \InvalidArgumentException('Failed to build soap client');
		}
	}


	/**
	 * @throws WrongDataException
	 */
	public function packetAttributesValid(PacketAttributes $attributes): mixed
	{
		try {
			return $this->soap->packetAttributesValid($this->apiKey, $attributes);
		} catch (\SoapFault $e) {
			throw new WrongDataException($e->getMessage(), $e->getCode(), $e->getPrevious());
		}
	}


	public function packetClaimAttributesValid(ClaimAttributes $attributes): mixed
	{
		return $this->soap->packetClaimAttributesValid($this->apiKey, $attributes);
	}


	public function createPacket(PacketAttributes $attributes): mixed
	{
		return $this->soap->createPacket($this->apiKey, $attributes);
	}


	public function createPacketClaim(ClaimAttributes $attributes): mixed
	{
		return $this->soap->createPacketClaim($this->apiKey, $attributes);
	}


	public function createShipment(int $packetId, string $customBarcode): mixed
	{
		return $this->soap->createShipment($this->apiKey, $packetId, $customBarcode);
	}


	public function packetStatus(int $packetId): mixed
	{
		return $this->soap->packetStatus($this->apiKey, $packetId);
	}


	public function packetTracking(int $packetId): mixed
	{
		return $this->soap->packetTracking($this->apiKey, $packetId);
	}


	public function packetGetStoredUntil(int $packetId): mixed
	{
		return $this->soap->packetGetStoredUntil($this->apiKey, $packetId);
	}


	public function packetSetStoredUntil(int $packetId, \DateTimeInterface $date): mixed
	{
		return $this->soap->packetSetStoredUntil($this->apiKey, $packetId, $date);
	}


	public function barcodePng(string $barcode): mixed
	{
		return $this->soap->barcodePng($this->apiKey, $barcode);
	}


	public function packetLabelPdf(int $packetId, string $format, int $offset): mixed
	{
		return $this->soap->packetLabelPdf($this->apiKey, $packetId, $format, $offset);
	}


	/**
	 * @param int[] $packetIds
	 */
	public function packetsLabelsPdf(array $packetIds, string $format, int $offset): mixed
	{
		return $this->soap->packetsLabelsPdf($this->apiKey, $packetIds, $format, $offset);
	}


	public function packetCourierNumber(int $packetId): mixed
	{
		return $this->soap->packetCourierNumber($this->apiKey, $packetId);
	}


	public function senderGetReturnRouting(string $senderLabel): mixed
	{
		return $this->soap->senderGetReturnRouting($this->apiKey, $senderLabel);
	}
}
