<?php


namespace App\Domain\General\Sitinfo\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class SitinfoDTO extends DataTransferObject
{
    /* @var double */
    public $one_dinar_in_dollar;
    /* @var double */
    public $taxes_in_kuwait_in_dinar;
    /* @var double */
    public $taxes_out_kuwait_in_dinar;
    /* @var double */
    public $one_dollars_in_QAR;
    /* @var double */
    public $one_dollars_in_SAR;
    /* @var double */
    public $one_dollars_in_OMR;
    /* @var double */
    public $one_dollars_in_AED;
    /* @var double */
    public $one_dollars_in_BHD;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;
    public static function fromRequest($request)
    {
        return new self([
            'one_dinar_in_dollar'       => $request['one_dinar_in_dollar'] ?? null,
            'taxes_in_kuwait_in_dinar'  => $request['taxes_in_kuwait_in_dinar'] ?? null,
            'taxes_out_kuwait_in_dinar' => $request['taxes_out_kuwait_in_dinar'] ?? null,
            'one_dollars_in_QAR'        => $request['one_dollars_in_QAR'] ?? null,
            'one_dollars_in_SAR'        => $request['one_dollars_in_SAR'] ?? null,
            'one_dollars_in_OMR'        => $request['one_dollars_in_OMR'] ?? null,
            'one_dollars_in_AED'        => $request['one_dollars_in_AED'] ?? null,
            'one_dollars_in_BHD'        => $request['one_dollars_in_BHD'] ?? null,
            'created_by_user_id'        => $request['created_by_user_id'] ?? null,
            'updated_by_user_id'        => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id'        => $request['deleted_by_user_id'] ?? null,

        ]);
    }
}
