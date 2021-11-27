# Deeper

Deeper is a easy way to compare if 2 objects is equal based on values in these objects. This library is heavily inspired in Golang's [reflect.DeepEqual()](https://pkg.go.dev/reflect#DeepEqual).

Deeper supports parent class with any kind of access attributes, public, protected and private. Deeper validates objects as atribbutes too, then, while have objects to test, Deeper will test recursively.

### Installation

```bash
composer require redrat/deeper
```

### Usage

It's very easy, create instance of Deeper object with objects to compare and check if it deep equal, like example below.

```php
use RedRat\Deeper\Deeper;

$deeper = new Deeper($objectOne, $objectTwo);
$deeper->isEqual(); // if have same values on both objects, return TRUE
```

### Known limitations

Some PHP core objects can't work properly, in this case, open an issue for we create a custom validation for this object.

### Author

[![Joubert RedRat](https://img.shields.io/badge/Joubert-RedRat-red)](https://joubertredrat.github.io)
[![and the contributors](https://img.shields.io/badge/and%20the-contributors-success)](https://github.com/joubertredrat/Deeper/graphs/contributors)

### License

The cute and amazing [MIT](https://github.com/joubertredrat/Deeper/blob/master/license).