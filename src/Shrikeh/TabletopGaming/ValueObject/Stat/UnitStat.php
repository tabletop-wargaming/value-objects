<?php
/**
 * Created by PhpStorm.
 * User: shrikeh
 * Date: 21/03/2014
 * Time: 18:41
 */ 
namespace Shrikeh\TabletopGaming\ValueObject\Stat;

interface UnitStat
{
    public function getCode();

    public function getValue();
}
