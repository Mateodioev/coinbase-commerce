# coinbase-commerce

## Install

```bash
composer require mateodioev/coinbase-commerce
```

Add your api key

```php
use Mateodioev\CoinbaseCommerce\Client;

Client::init($your_api_key);
```

Contents
  - [Charges](#charges)
  - [Checkouts](#checkouts)
  - [Invoices](#invoices)
  - [Events](#events)

## Charges

```php
use Mateodioev\CoinbaseCommerce\Charges;
$charges = new Charges;
```


### List charges

```php
$charges->list();
```

### Create charge 

```php
$chargeData = [
  'name'         => 'Charge name',
  'description'  => 'My description',
  'pricing_type' => 'fixed_price',
  'local_price'  => [
    'amount'   => '10.00',
    'currency' => 'USD'
  ],
  'metadata'     => [
    'user_id' => '123456789'
  ]
];
$charges->create($chargeData);
```

### Show a charge

```php
$charges->show($chargeId);
```

### Cancel a charge

```php
$charges->cancel($chargeId);
```

### Resolve a charge

```php
$charges->resolve($chargeId);
```

## Checkouts

```php
use Mateodioev\CoinbaseCommerce\Checkouts;
$checkouts = new Checkouts;
```

### List checkouts

```php
$checkouts->list();
```

### Create a checkout

```php
$checkoutData = [
  'name'         => 'The Sovereign Individual',
  'description'  => 'Mastering the Transition to the Information Age',
  'pricing_type' => 'fixed_price',
  'local_price'  => [
    'amount'   => '100.00',
    'currency' => 'USD'
  ],
  'requested_info' => ['name', 'email']
];
$checkouts->create($checkoutData);
```

### Show a checkout

```php
$checkouts->show($id);
```

### Update a checkout

```php
$checkoutData = [
    'name' => 'New name'
];
$checkouts->update($checkoutId, $checkoutData);
```

### Delete a checkout

```php
$checkouts->delete($checkoutId);
```

## Invoices

```php
use Mateodioev\CoinbaseCommerce\Invoices;
$invoices = new Invoices;
```

### List invoices

```php
$invoices->list();
```

### Create an invoice

```php
$invoiceData = [
  'business_name' => 'Crypto Payment\'s',
  'customer_email' => 'customer@test.com',
  'customer_name' => 'Test customer',
  'local_price' => [
    'amount'   => 10.00,
    'currency' => 'USD'
  ]
];
$invoices->create($invoiceData);
```

### Show an invoice

```php
$invoices->show($id);
```

### Void an invoice

```php
$invoices->void($id);
```

### Resolve an invoice

```php
$invoices->resolve($id);
```


## Events

```php
use Mateodioev\CoinbaseCommerce\Events;
$events = new Events;
```

### List events

```php
$events->list();
```

### Show an event

```php
$events->show($id);
```


## Coinbase doc's
See [coinbase-commerce docs](https://docs.cloud.coinbase.com/commerce/reference/)

