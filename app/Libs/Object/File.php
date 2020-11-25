<?php
/**
* @author khaihoangdev@gmail.com
* @desc 
* @return 
* @time 08h:12/12/2018
*/
namespace App\Libs\Object;

class File{
  public $name;
  public $time;
  public $extension;
  public $size;
  public $loc;
  public $ori_name;
  public $id;

  public function __construct($loc,$ori_name,$name,$extension,$size=0.0,$time=""){
    $this -> name = $name;
    $this -> extension = $extension;
    $this -> size = $size;
    $this -> time = $time;
    $this -> loc = $loc;
    $this -> ori_name = $ori_name;
  }
  
  /**
   * update
   *
   * @param  mixed $arr
   *
   * @return void
   */
  public function update($arr = ["name"=>null,"extension"=>null,"size"=>null,"time"=>null, "loc"=>null]){
    $this->name = $arr["name"]?$arr["name"]:$this->name;
    $this->ori_name = $arr["ori_name"]?$arr["ori_name"]:$this->ori_name;
    $this->extension = $arr["extension"]?$arr["extension"]:$this->extension;
    $this->size = $arr["size"]?$arr["size"]:$this->size;
    $this->time = $arr["time"]?$arr["time"]:$this->time;
    $this->loc = $arr["loc"]?$arr["loc"]:$this->loc;
  }

}
