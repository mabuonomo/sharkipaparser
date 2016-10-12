# SharkIpaParser

A simple php library to parse the Apple IPA's plist

#Installation
Add this library at your composer.json
```json    
...
    "minimum-stability": "dev",
    "require": {
        "php": ">=5.3",
        "sharksoft/sharkipaparser": "master"
    },
...
```

Then
```php
composer install
```

#Use (for details see test.php)
```php
require_once 'class/SharkIpaParser.php';
//instance
$shark = new SharkIpaParser\SharkIpaParserHelper();
$shark->load_ipa('C:\Users\mario\Desktop\test.ipa');
$array_plist = $shark->read_plist();
```

The result of $array_plist is something similar:
```xml
array (size=34)
  'UIRequiredDeviceCapabilities' => 
    array (size=1)
      0 => string 'armv7' (length=5)
  'UIRequiresFullScreen' => boolean true
  'CFBundleInfoDictionaryVersion' => string '6.0' (length=3)
  'UISupportedInterfaceOrientations~ipad' => 
    array (size=2)
      0 => string 'UIInterfaceOrientationLandscapeLeft' (length=35)
      1 => string 'UIInterfaceOrientationLandscapeRight' (length=36)
  'DTPlatformVersion' => string '10.0' (length=4)
  'DTCompiler' => string 'com.apple.compilers.llvm.clang.1_0' (length=34)
  'DTSDKName' => string 'iphoneos10.0' (length=12)
  'CFBundleName' => string 'AppName' (length=9)
  'UIMainStoryboardFile~ipad' => string 'MainiPad' (length=8)
  'CFBundleIcons' => 
    array (size=1)
      'CFBundlePrimaryIcon' => 
        array (size=1)
          'CFBundleIconFiles' => 
            array (size=3)
              ...
  'LSRequiresIPhoneOS' => boolean true
  'DTSDKBuild' => string '14A345' (length=6)
  'CFBundleShortVersionString' => string '0.5' (length=3)
  'CFBundleSupportedPlatforms' => 
...
```

The structure is key => value, for example you can access at CFBundleName in
this way:

```php
echo $array_plist['CFBundleName'];
```

#enjoy ;)