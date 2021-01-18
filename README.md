# Zasilkovna client in PHP using SOAP or REST API

## Installation

Install using [Composer](http://getcomposer.org/):

```sh
$ composer require baraja-core/zasilkovna
```

## Documentation

See http://www.zasilkovna.cz/popis-api/ for more info

## Example code

```php
$api = new Baraja\Zasilkovna\ApiRest($apiPassword, $apiKey);
// OR Soap implementation $api = new Baraja\Zasilkovna\ApiSoap($apiPassword, $apiKey);
$branch = new Branch($apiKey, new BranchStorageSqLite()); // There are multiple implementations of IBranchStorage BranchStorageSqLite using SQLite, BranchStorageFile using file in /tmp and BranchStorageMemory using simple variable (SLOW), You can implement your own by implementing IBranchStorage interface
$label = new Label($api, $branch);

// To greate new packet
$transporterPackage = new PacketAttributes(
	'ORDERID',
	'FirstName',
	'LastName',
	null,
	'addressId',
	null,
	'Company',
	'Email',
	'Phone',
	null,
	null,
	null,
	'www',
	false,
	'Street',
	'StreetNumber',
	'City',
	'ZipCode'
);

$api->createPacket($transporterPackage);

// Generate A4 label
$label->generateLabelFull($pdf, $transporterPackage);

// Generate A2 label
$label->generateLabelQuarter($pdf, $transporterPackage);

// Get full branch list as array
$branch->getBranchList();

// Returns branch detail by ID
$branch->find($branchId);
```
