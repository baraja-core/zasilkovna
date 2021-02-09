<?php

declare(strict_types=1);

namespace Baraja\Zasilkovna;


use Baraja\Zasilkovna\Model\ClaimAttributes;
use Baraja\Zasilkovna\Model\PacketAttributes;
use DateTimeInterface;

interface IApi
{
	public function packetAttributesValid(PacketAttributes $attributes): mixed;

	public function packetClaimAttributesValid(ClaimAttributes $attributes): mixed;

	public function createPacket(PacketAttributes $attributes): mixed;

	public function createPacketClaim(ClaimAttributes $attributes): mixed;

	public function createShipment(int $packetId, string $customBarcode): mixed;

	public function packetStatus(int $packetId): mixed;

	public function packetTracking(int $packetId): mixed;

	public function packetGetStoredUntil(int $packetId): mixed;

	public function packetSetStoredUntil(int $packetId, DateTimeInterface $date): mixed;

	public function barcodePng(string $barcode): mixed;

	public function packetLabelPdf(int $packetId, string $format, int $offset): mixed;

	/**
	 * @param int[] $packetIds
	 */
	public function packetsLabelsPdf(array $packetIds, string $format, int $offset): mixed;

	public function packetCourierNumber(int $packetId): mixed;

	public function senderGetReturnRouting(string $senderLabel): mixed;
}
