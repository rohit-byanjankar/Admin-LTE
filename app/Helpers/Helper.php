<?php

class Helper
{
    public static function check($permissions,$role,$model,$permission_array)
    {
        if (isset($permission_array[$role][$model]) && in_array($permissions,$permission_array[$role][$model]))
            return true;
        else
            return false;
    }
}
