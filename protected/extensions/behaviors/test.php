<?php
class test extends  CActiveRecordBehavior{
	public $cat_id;
	public $table;
	public function test(){
		return  'ok333'.$this->cat_id;
	}
}