<?php

class Cliente extends ActiveRecord
{

    protected $logTimestamp = TRUE;

    public static function listarRecentes(int $dias = 10)
    {
        return self::all("created_at >= '" . date('Y-m-d h:m:i', strtotime("-{$dias} days")) . "'");
    }

    public static function numTotal()
    {
        return self::count();
    }
}
