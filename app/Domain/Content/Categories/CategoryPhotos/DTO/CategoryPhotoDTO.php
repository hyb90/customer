<?php


namespace App\Domain\Content\Categories\CategoryPhotos\DTO;


use phpseclib\Math\BigInteger;
use Spatie\DataTransferObject\DataTransferObject;

class CategoryPhotoDTO extends DataTransferObject
{
    /** @var string */
    public $photo_path;
    /** @var double|integer */
    public $photo_size;
    /** @var integer */
    public $category_id;
    /** @var integer */
    public $device_id;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request)
    {
        return new self([
            'photo_path' => $request['photo_path'] ?? null,
            'photo_size' => $request['photo_size'] ?? null,
            'category_id' => $request['category_id'] ?? null,
            'device_id' => $request['device_id'] ?? null,
            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,
        ]);
    }

}

