<?php

class MyViewModel
{
  /** 
   * @property array $GlobalVariables
   */
  public $GlobalVariables;
  
  /**
   * Initializes global variables and adds them to javascript if this is not an 
   * ajax call
   */
  public function __construct()
  {
    $this->GlobalVariables = array(
      'BaseUrl' => Yii::app()->getBaseUrl(true)
    );
    if(!Yii::app()->getRequest()->getIsAjaxRequest())
    {
      Yii::AddGlobalJavascriptVariables($this->GlobalVariables);
    }
  }
}

?>
