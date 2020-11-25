<?php
/**
 * Purpose: Defining public class/function
 * Using: \App\Libs\Generate
 */

namespace App\Libs;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

use App\Libs\Object\File as _File;
use App\Libs\Convert;


class Generate{
    /**
    * @author khaihoangdev@gmail.com
    * @desc generate file name as filename-timesalt.extension
    * @return string
    * @time 09h:10/12/2018
    */
    public static function gen_file_name($_file_name, $extension){
      $_file_name = substr(strtolower($_file_name),0,50);
      $time = (int) (microtime(true) * 1000000000);
      $time_salt = sha1($time);
      $file_name = str_slug(trim(pathinfo($_file_name,PATHINFO_FILENAME)),'-');
      // $extension = File::extension($_file_name);
      return $file_name.'-'.$time_salt.'.'.$extension;
    }

    /**
    * @author khaihoangdev@gmail.com
    * @desc gen folder name for upload with username
    * @return {string} 
    * @time 10h:10/12/2018
    */

    public static function gen_folder_name(){
      $user_name = Auth::user()->username;
      $directory = 'uploads/'.$user_name;
      return $directory;
    }
    /**
    * @author khaihoangdev@gmail.com
    * @desc gen file info with location passing
    * @return {File} object
    * @time 09h:12/12/2018
    */
    public static function gen_file_info($file_loc){
      $size = round(Storage::size($file_loc)/1000000,2);
      $extension = File::extension($file_loc);
      $ori_name = pathinfo($file_loc,PATHINFO_FILENAME).'.'.$extension;
      $name = str_limit(pathinfo($file_loc,PATHINFO_FILENAME),10,"...").'.'.$extension;
      $time = Convert::date_convert(date("H:i m/d/Y", Storage::lastModified($file_loc)));
      $file_loc = url('public/'.$file_loc);
      return new _File($file_loc, $ori_name, $name,  $extension, $size, $time);
    }
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc gen an array with list value as arr[key] with key was passing by user
    * @return []
    * @time 12/24/2018
    * @status Finish
    */
    public static function gen_array($arr, $key){
        $_arr = [];
        foreach ($arr as $i){
            array_push($_arr, $i->toArray()[$key]);
        }
        return $_arr;
    }

    public static function gen_array_contain_object($arr, $key){
        $_arr = [];
        foreach ($arr as $i){
            $_arr[$i->toArray()[$key]]=$i;
        }
        return $_arr;
    }
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc generate skip and take with page number passing
    * @return ["skip"=>int,"take"=>int]
    * @time 14h:28/12/2018
    * @status Finish
    */
    public static function gen_skip_take($page=null){
      $paging = [];
      $page = $page?$page:0;
      $paging['skip'] = $page * 20; //20 default
      $paging['take'] = $paging['skip'] + 20;

      return $paging;
    }
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc gen page
    * @return []
    * @time 1/2/2019
    * @status Finish
    */
    public static function paging($model, $per = 10){
        $pages = $model->paginate($per);
        return $pages;
    }

    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc gen time left
    * @return []
    * @time 1/2/2019
    * @status Finish
    * @requires 
    * @param int time
    * @param string type |day|year|month|second|hour|minute|
    */
    public static function time_left($time, $type = 'day'){
        $today = time();
        $left = abs($today - $time);
        switch($type){
            case 'year':{
              return (int)round($left / 31556926);
            } 
            case 'week':{
              return (int)round($left / 604800);
            } 
            case 'day':{
              return (int)round($left / 86400);
            } 
            case 'hour':{
              return (int)round($left / 3600);
            } 
            case 'minute':{
              return (int)round($left / 60);
            } 
            case 'second':{
              return round($left);
            } 
        }
        return 0;  
    }
}