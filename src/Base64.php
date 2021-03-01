<?php

namespace BrBunny\BrUploader;

use CoffeeCode\Uploader\Uploader;

class Base64 extends Uploader
{
    protected static $allowTypes = [
        'jpg',
        'jpeg',
        'gif',
        'png'
    ];

    /**
     * @param string $data
     * @param string $name
     * @param boolean $removeOld
     * @return string
     * @throws \Exception
     */
    public function upload(string $data, string $name): string
    {
        if (!preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
            throw new \Exception("Not a valid data from image");
        }

        $data = substr($data, strpos($data, ',') + 1);
        $ext = strtolower($type[1]);

        if (!in_array($ext, self::$allowTypes)) {
            throw new \Exception('invalid image type');
        }

        $image = base64_decode($data, true);

        if ($image === false) {
            throw new \Exception('Generate image failed');
        }

        $this->ext = $ext;
        $this->name($name);

        if (!file_put_contents("{$this->path}/{$this->name}", $image)) {
            throw new \Exception('Upload failed');
        }

        return "{$this->path}/{$this->name}";
    }

    /**
     * @param string $path
     * @return boolean
     */
    public static function remove(string $path = "/"): bool
    {
        if (file_exists($path) && is_file($path)) {
            unlink($path);
            return true;
        }
        return false;
    }
}
