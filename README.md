# SharkIpaParser

A simple php library to parse the Apple IPA's plist

#Installation
composer install

#Use (for details see test.php)
```php
require_once 'class/SharkIpaParser.php';
//instance
$shark = new SharkIpaParser\SharkIpaParserHelper();
$shark->load_ipa('C:\Users\mario\Desktop\test.ipa');
$shark->read_plist();
```
