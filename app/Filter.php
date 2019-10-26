<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public static function filter($key){
        $items = [
            'Scale'=>[
              1 => 'Any',
              2 => '1:10',
              3 => '1:12',
              4 => '1:18',
              5 => '1:24',
              6 => '1:32',
              7 => '1:50',
              8 => '1:72',
              9 => '1:700'
            ],
            'Vendor'=>[
              1 => 'Any',
              2 => 'Autoart Studio Design',
              3 => 'Carousel DieCast Legends',
              4 => 'Classic Metal Creations',
              5 => 'Exoto Designs',
              6 => 'Gearbox Collectibles',
              7 => 'Highway 66 Mini Classics',
              8 => 'Min Lin Diecast',
              9 => 'Motor City Art Classics',
              10 => 'Red Start Diecast',
              11 => 'Second Gear Diecast',
              12 => 'Studio M Art Models',
              13 => 'Unimax Art Galleries',
              14 => 'Welly Diecast Productions'
            ]
        ];
        return ArrayHelper::getValue($items,$key,[]);

    }

    public function getItemScale(){
        return self::itemsAlias('Scale');
    }

    public function getItemVendor(){
        return self::itemsAlias('Vendor');
    }

}
