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

    public static function getPermission($permission_granted,$model,$role,$permission){
        if (isset($permission_granted[$role][$model]) && in_array($permission,$permission_granted[$role][$model]))
            return true;
        else
            return false;
    }
}
