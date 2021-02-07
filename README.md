# BrUploader @BrBunny

[![Maintainer](https://img.shields.io/badge/maintainer-@kevind3v-blue.svg?style=flat-square)](https://github.com/kevind3v)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/brbunny/bruploader.svg?style=flat-square)](https://packagist.org/packages/brbunny/bruploader)
[![Latest Version](https://img.shields.io/github/v/release/kevind3v/bruploader.svg?style=flat-square)](https://github.com/kevind3v/bruploader/releases/)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/kevind3v/bruploader/blob/main/LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/brbunny/bruploader.svg?style=flat-square)](https://packagist.org/packages/brbunny/bruploader)

It is a base64 upload manager for PHP with ease and security

#### Installation

BrUploader is available through Composer:

```sh
"brbunny/bruploader": "1.0.*"
```

or run

```sh
composer require brbunny/bruploader
```

#### Documentation

_BrUploader is a component made based on the [Uploader](https://packagist.org/packages/coffeecode/uploader) library. It aims to facilitate the upload of images in base64 format._

_For more details on how to use it, see an example folder in the component directory. It will have an example of use._

BrUploader é um componente feito com base na biblioteca [Uploader](https://packagist.org/packages/coffeecode/uploader). Visa facilitar o upload de imagens no formato base64.

Para obter mais detalhes sobre como usá-lo, consulte uma pasta de exemplo no diretório do componente. Terá um exemplo de uso.

##### Initialization

_For details on how to use the upload, see a sample folder in the component directory. In it you will have an example of use for each class. BrUploader works like this:_

Para mais detalhes sobre como usar o upload, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. BrUploader funciona assim:

##### Upload and Image

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

$image = new \BrBunny\BrUploader\BrBase64("uploads", "images");

// $_POST['image'] => Base64 string of the image

if ($_POST && $_POST['image']) {
    try {
        $upload = $image->upload($_POST['image'], $_POST['name']);
        echo "<img src='{$upload}' width='100%'>";
    } catch (Exception $e) {
        echo "<p>(!) {$e->getMessage()}</p>";
    }
}
```

### Credits

- [Kevin S. Siqueira](https://github.com/kevind3v) (Developer of this library)
- [Uploader](https://packagist.org/packages/coffeecode/uploader) (Base library)

### License

The MIT License (MIT). Please see [License File](https://github.com/kevind3v/bruploader/blob/main/LICENSE) for more information.
