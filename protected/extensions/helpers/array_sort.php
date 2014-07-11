<?php
class array_sort{

private $db;
private $table;
public function __construct(){
	/*
	exit(ok);
		$this->db=$db;
		$this->table=$table;
		*/
	}

function addsort($CatagoryID,$SortName)
{
if($CatagoryID==0){
    $Lft=0;
    $Rgt=1;
    }else{
    $Result=$this->checkcatagory($CatagoryID);
    //取得父类的左值,右值
    $Lft=$Result['Lft'];
    $Rgt=$Result['Rgt'];
    $this->db->query("UPDATE `".$this->table."` SET `Lft`=`Lft`+2 WHERE `Lft`>$Rgt");
    $this->db->query("UPDATE `".$this->table."` SET `Rgt`=`Rgt`+2 WHERE `Rgt`>=$Rgt");
    }


//插入
if($this->db->query("INSERT INTO `".$this->table."` SET `Lft`='$Rgt',`Rgt`='$Rgt'+1,`Name`='$SortName'")){
    //$this->referto("成功增加新的类别","JAVASCRIPT:HISTORY.BACK(1)",3);
    return 1;
    }else{
    //$this->referto("增加新的类别失败了","JAVASCRIPT:HISTORY.BACK(1)",3);
    return -1;
    }
} // end func 
	

function deletesort($CatagoryID)
{
//取得被删除类别的左右值,检测是否有子类,如果有就一起删除
$Result=$this->checkcatagory($CatagoryID);
$Lft=$Result['Lft'];
$Rgt=$Result['Rgt'];
//执行删除
if($this->db->query("DELETE FROM `".$this->table."` WHERE `Lft`>=$Lft AND `Rgt`<=$Rgt")){
    $Value=$Rgt-$Lft+1;
    //更新左右值
    $this->db->query("UPDATE `".$this->table."` SET `Lft`=`Lft`-$Value WHERE `Lft`>$Lft");
    $this->db->query("UPDATE `".$this->table."` SET `Rgt`=`Rgt`-$Value WHERE `Rgt`>$Rgt");
    //$this->referto("成功删除类别","javascript:history.back(1)",3);
    return 1;
    }else{
    //$this->referto("删除类别失败了","javascript:history.back(1)",3);
    return -1;
    }
} // end func

/**
    * Short description. 
    * 1,所有子类,不包含自己;2包含自己的所有子类;3不包含自己所有父类4;包含自己所有父类
    * Detail description
    * @param         none
    * @global         none
    * @since         1.0
    * @access         private
    * @return         void
    * @update         date time
*/
function getcatagory($CatagoryID,$type=1)
{
$Result=$this->checkcatagory($CatagoryID);
$Lft=$Result['Lft'];
$Rgt=$Result['Rgt'];
$SeekSQL="SELECT * FROM `".$this->table."` WHERE ";
switch ($type) {
     case "1":
    $condition="`Lft`>$Lft AND `Rgt`<$Rgt";
    break;
    case "2":
    $condition="`Lft`>=$Lft AND `Rgt`<=$Rgt";
    break;
     case "3":
         $condition="`Lft`<$Lft AND `Rgt`>$Rgt";
         break; 
    case "4":
    $condition="`Lft`<=$Lft AND `Rgt`>=$Rgt";
    break;
    default :
    $condition="`Lft`>$Lft AND `Rgt`<$Rgt";
    ;
    } 
$SeekSQL.=$condition." ORDER BY `Lft` ASC";
$Sorts=$this->db->getrows($SeekSQL);
return $Sorts;
} // end func

/**
    * Short description. 
    * 取得直属父类
    * Detail description
    * @param         none
    * @global         none
    * @since         1.0
    * @access         private
    * @return         void
    * @update         date time
*/
function getparent($CatagoryID)
{
$Parent=$this->getcatagory($CatagoryID,3);
return $Parent;
} // end func

/**
    * Short description. 
    * 移动类,如果类有子类也一并移动
    * Detail description
    * @param         none
    * @global         none
    * @since         1.0
    * @access         private
    * @return         void
    * @update         date time
*/
function movecatagory($SelfCatagoryID,$ParentCatagoryID)
{
$SelfCatagory=$this->checkcatagory($SelfCatagoryID);
$NewCatagory=$this->checkcatagory($ParentCatagoryID);


$SelfLft=$SelfCatagory['Lft'];
$SelfRgt=$SelfCatagory['Rgt'];
$Value=$SelfRgt-$SelfLft;
//取得所有分类的ID方便更新左右值
$CatagoryIDS=$this->getcatagory($SelfCatagoryID,2);
foreach($CatagoryIDS as $v){
    $IDS[]=$v['CatagoryID'];
    }
$InIDS=implode(",",$IDS);


$ParentLft=$NewCatagory['Lft'];
$ParentRgt=$NewCatagory['Rgt'];
//print_r($InIDS);
//print_r($NewCatagory);
//print_r($SelfCatagory);
//exit;
if($ParentRgt>$SelfRgt){
    $UpdateLeftSQL="UPDATE `".$this->table."` SET `Lft`=`Lft`-$Value-1 WHERE `Lft`>$SelfRgt AND `Rgt`<=$ParentRgt";
    $UpdateRightSQL="UPDATE `".$this->table."` SET `Rgt`=`Rgt`-$Value-1 WHERE `Rgt`>$SelfRgt AND `Rgt`<$ParentRgt";
    $TmpValue=$ParentRgt-$SelfRgt-1;
    $UpdateSelfSQL="UPDATE `".$this->table."` SET `Lft`=`Lft`+$TmpValue,`Rgt`=`Rgt`+$TmpValue WHERE `CatagoryID` IN($InIDS)";
    }else{
    $UpdateLeftSQL="UPDATE `".$this->table."` SET `Lft`=`Lft`+$Value+1 WHERE `Lft`>$ParentRgt AND `Lft`<$SelfLft";
    $UpdateRightSQL="UPDATE `".$this->table."` SET `Rgt`=`Rgt`+$Value+1 WHERE `Rgt`>=$ParentRgt AND `Rgt`<$SelfLft";
    $TmpValue=$SelfLft-$ParentRgt;
    $UpdateSelfSQL="UPDATE `".$this->table."` SET `Lft`=`Lft`-$TmpValue,`Rgt`=`Rgt`-$TmpValue WHERE `CatagoryID` IN($InIDS)";
    }
$this->db->query($UpdateLeftSQL);
$this->db->query($UpdateRightSQL);
$this->db->query($UpdateSelfSQL);
//$this->referto("成功移动类别","javascript:history.back(1)",3);
return 1;
} // end func

/**
    * Short description. 
    *
    * Detail description
    * @param         none
    * @global         none
    * @since         1.0
    * @access         private
    * @return         void
    * @update         date time
*/
function checkcatagory($CatagoryID)
{
//检测父类ID是否存在
$SQL="SELECT * FROM `".$this->table."` WHERE `CatagoryID`='$CatagoryID' LIMIT 1";
$Result=$this->db->getrow($SQL);
if(count($Result)<1){
    $this->referto("父类ID不存在,请检查","javascript:history.back(1)",3);
    }
return $Result;     
} // end func

/**
    * Short description. 
    *
    * Detail description
    * @param         none
    * @global         none
    * @since         1.0
    * @access         private
    * @return         array($Catagoryarray,$Deep)
    * @update         date time
*/
function sort2array($CatagoryID=0)
{
     $Output = array();
     if($CatagoryID==0){
    $CatagoryID=$this->getrootid();
    }
     if(empty($CatagoryID)){
    return array();
    exit;
    }
     $Result = $this->db->query('SELECT Lft, Rgt FROM `'.$this->table.
                                 '` WHERE `CatagoryID`='.$CatagoryID); 
     if($Row = $this->db->fetch_array($Result)) {
     $Right = array(); 
     $Query = 'SELECT * FROM `'.$this->table.
                 '` WHERE Lft BETWEEN '.$Row['Lft'].' AND '. 
                 $Row['Rgt'].' ORDER BY Lft ASC';
     
     $Result = $this->db->query($Query); 
     while ($Row = $this->db->fetch_array($Result)) { 
         if (count($Right)>0) { 
    while ($Right[count($Right)-1]<$Row['Rgt']) { 
    array_pop($Right);
    } 
         }
    $Output[]=array('Sort'=>$Row,'Deep'=>count($Right));
     $Right[] = $Row['Rgt'];
     }
     }
     return $Output;     
} // end func

/**
    * Short description. 
    *
    * Detail description
    * @param         none
    * @global         none
    * @since         1.0
    * @access         private
    * @return         void
    * @update         date time
*/
function getrootid()
{
$Query="SELECT * FROM`".$this->table."` ORDER BY `Lft` ASC LIMIT 1";
$RootID=$this->db->getrow($Query);
if(count($RootID)>0){
    return $RootID['CatagoryID'];
    }else{
    return 0;
    }
} // end func

/**
    * Short description. 
    *
    * Detail description
    * @param         none
    * @global         none
    * @since         1.0
    * @access         private
    * @return         void
    * @update         date time
*/
function referto($msg,$url,$sec)
{
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
    echo "<meta http-equiv=refresh content=$sec;URL=$url>";
         if(is_array($msg)){
    foreach($msg as $key=>$value){
    echo $key."=>".$value."<br>";
             }
             }else{
             echo $msg;
             }
     exit;
} // end func


}