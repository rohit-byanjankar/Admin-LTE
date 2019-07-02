<?php

namespace App\Http\Middleware;

use App\Settings;
use Closure;
use DB;
use App\Registrar;
use Config;

class DatabaseSwitching
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        DB::disconnect();
        $result=Registrar::where("community_url",$request->root())->first();
        $databaseName=$result->database_name;
        Config::set('database.connections.mysql.database',$databaseName);
        DB::purge();
        DB::connection();

        $temp=Settings::select('key','value')->get();
        $settings=[];
        foreach($temp as $key=>$value){
            $settings[$value->key]=$value->value;
        }

            config(['basic_settings'=>$settings]);


        return $next($request);
    }
}
