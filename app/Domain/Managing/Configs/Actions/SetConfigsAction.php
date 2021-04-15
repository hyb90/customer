<?php


namespace App\Domain\Managing\Configs\Actions;


use App\Domain\Managing\Configs\DTO\ConfigsDTO;
use App\Domain\Managing\Configs\Model\Config;

class SetConfigsAction
{

    public static function execute(
        ConfigsDTO $configsDTO
    ){
            $config = null ;
        if(Config::all()->count() != 0){
            $config = Config::all()[0];
            $config->update($configsDTO->all());
            $config->save();
        }else{
            $config = new Config($configsDTO->all());
            $config->save();
        }
        return $config;
    }
}
