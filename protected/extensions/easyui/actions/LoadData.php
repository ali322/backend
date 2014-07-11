<?php
class LoadData extends CAction{
               public  $modelName;
               public  $selects;
               public  $sortColumn;
               public  $relationColumns;
               public  $relationSearchColumns;
               public  $lookupColumns;
               
               public  function run(){
			$criteria=new CDbCriteria;
                        
                        $this->lookupColumns=isset($this->lookupColumns)?$this->lookupColumns:array();
                        $this->relationColumns=isset($this->relationColumns)?$this->relationColumns:array();
                        $this->relationSearchColumns=isset($this->relationSearchColumns)?$this->relationSearchColumns:array();
			if(isset($_POST['search_form'])){
				foreach($_POST[$this->modelName] as $k=>$v){
					if(is_numeric($v))
						$criteria->compare('t.'.$k,$v,false);
                                        elseif(array_key_exists ($k, $this->relationSearchColumns))
                                                $criteria->compare($this->relationSearchColumns[$k],$v);
                                        else
                                                $criteria->compare('t.'.$k,$v,true);
				}
			}
                        $relationWith=array();
                        foreach($this->relationColumns as $k=>$v){
                            $relationWith[$v[0]]=array('select'=>$v[1]);
                        }
                        $criteria->select=$this->selects;
                        $criteria->order=implode(' ',$this->sortColumn);
                        $criteria->with=$relationWith;
                        $criteria->together=true;
                        
                   //     CVarDumper::dump($criteria);exit;
			$page=isset($_POST['page'])?$_POST['page']:1;
			$limit=isset($_POST['rows'])?$_POST['rows']:15;
 			$dataProvider = new CActiveDataProvider($this->modelName, array(
        			'criteria'=>$criteria,
        			'pagination'=>array(
            			'currentPage'=>$page-1, // CActiveDataProvider is zero-based, jqGrid not
            			'pageSize'=>$limit,
        			),
    		));
			$count = $dataProvider->totalItemCount;
   			
   			$reponse=array();
   			$reponse['total']=$count;
   			$goods=$dataProvider->getData();
                 //         CVarDumper::dump($this->relationColumns);exit;
   			foreach($goods as $key=>$row){
                               foreach ($row as $k=>$v){
                                   if(array_key_exists($k,$this->relationColumns)){
                                      $reponse['rows'][$key][$k]=$row->{$this->relationColumns[$k][0]}->{$this->relationColumns[$k][1]};
                                    }
                                    elseif(in_array($k,$this->lookupColumns)){
                                       $reponse['rows'][$key][$k]=LookUp::getItem($v,$k);
                                    }
                                    else
                                       $reponse['rows'][$key][$k]=$v;
                               }
                        //     $reponse['rows'][$key]['cat_id']=$row->cate;
                         //      $reponse['rows'][$key]['brand_id']=$row->brand->brand_name;
                         //      $reponse['rows'][$key]['is_on_sale']=LookUp::saleStatus($row->is_on_sale);
   			}
                       if($count ==0)
                           $reponse['rows']=array();
   			echo CJavaScript::jsonEncode($reponse);
	}
}
?>
