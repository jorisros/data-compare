DataCompare component
=====================
This is a component that enables you detect if there are changes between two arrays.

Requiments
==========
This component is compatible from php 7.0 < 7.3.

Example
============
```php

$product = Product::getBySku($xmlProduct['sku']);

if (!$product) {
    $product = new Product();
}

$dataproviderA = new \DataCompare\SimpleProvider();
$dataproviderA->addString('sku', $product->getSku());
$dataproviderA->addString('title', $product->getTitle());
$dataproviderA->addString('price', $product->getPrice());

$dataproviderB = new \DataCompare\SimpleProvider(); 
$dataproviderA->addString('sku', $jsonImport->sku);
$dataproviderA->addString('title', $jsonImport->title);
$dataproviderA->addString('price', $jsonImport->price);

$compareComponent = new \DataCompare\DataCompare($dataproviderA, $dataproviderB);

if (!$compareComponent->isTheSame()){
    // If result is not equal update the product
    $product->save()
}

```


TODO
==== 
- Check if stucture of the array the same are
- Gives back on which data set there is a problem