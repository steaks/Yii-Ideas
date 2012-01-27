<?php
Yii::import('application.data.ar.MyFakeActiveRecordOne');
Yii::import('application.data.ar.MyFakeActiveRecordTwo');

class SiteIndexVM extends MyViewModel
{
  /**
   * @property $PropertyBoundToJavascript
   * @attributes JSON
   */
  public $PropertyBoundToJavascript;
          
  /**
   * @property $PropertyNotBoundToJavascript
   */
  public $PropertyNotBountToJavascript;
  
  /**
   * @property $ColumnFromTableOne
   */
  public $ColumnFromTableOne;
  
  /**
   * @property $ColumnFromTableTwo
   */
  public $ColumnFromTableTwo;
          
  public function __construct()    
  {
    parent::__construct();
    $this->PropertyBoundToJavascript = "I am rendered by SiteIndex.js and marked up by SiteIndex.css.  (See SiteIndexVM.  I have the JSON attribute)";
    $this->PropertyNotBountToJavascript = "I am rendered by SiteIndex.php and marked up by SiteIndex.css";
    $this->ColumnFromTableOne = MyFakeActiveRecordOne::GetFakeColumn();
    $this->ColumnFromTableTwo = MyFakeActiveRecordTwo::GetFakeColumn();
  }
}

?>
