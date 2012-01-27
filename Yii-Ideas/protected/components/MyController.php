<?php

class MyController extends Controller
{
  private $_base;
  private $_id;
  
  /**
   * Sets controller id and base path variables and registers the jquery library
	 * @param string $id id of this controller
	 * @param CWebModule $module the module that this controller belongs to.
   */
  public function __construct($id, CWebModule $module=null)
  {
    parent::__construct($id, $module);
    $this->_id = $id;
    $this->_base = Yii::app()->getBasePath();
    Yii::app()->getClientScript()->registerCoreScript('jquery');
    
  }
  
  /**
	 * This function binds Javscript and CSS if instructed to do so.  Then it calls the parent render function.
	 *
	 * @param string $view name of the view to be rendered. See {@link getViewFile} for details
	 * about how the view script is resolved.
	 * @param array $data data to be extracted into PHP variables and made available to the view script
	 * @param boolean $return whether the rendering result should be returned instead of being displayed to end users.
	 * @return string the rendering result. Null if the rendering result is not required.
	 * @see renderPartial
	 * @see getLayoutFile
	 */
	public function render($view, $data = null, $return = false, $BindJS = true, $BindCSS = true)
  {
    if($BindJS)
    {
      $this->bindJS($data['model'], $view);
    }
    if($BindCSS)
    {
      $this->BindCSS($view);
    }
    parent::render($view, $data, $return);
  }
        
  //<editor-fold defaultstate="collapsed" desc="PrivateFunctions">
        
  /**
   * Registers Javascript file and binds View Model to Javascript if Javascript file exists
   * @param MyViewMode $VM
   * @param $jsFileName
   * @see RegisterJSDependencies
   */   
  private function BindJS(MyViewModel $VM, $jsFileName)
  {
    $js_url = "$this->_base/assets/$this->_id/js/$jsFileName.js";
    if(!file_exists($js_url))
    {
      return;
    }
    $js_url = Yii::app()->getAssetManager()->publish($js_url);
    Yii::app()->getClientScript()->registerScriptFile($js_url);    
    $VMJsonProperties = self::GetJsonProperties($VM);
    ?><script type="text/javascript">UserViewVM = <?php echo CJSON::encode($VMJsonProperties) ?></script><?php
    
    $this->RegisterJSDependencies($jsFileName);
  }
  
  
  /**
   * Registeres CSS if file exists and calls function that registers CSS dependencies for $cssFileName
   * @param string $cssFileName
   */
  private function BindCSS($cssFileName)
  { 
    $css_url = "$this->_base/assets/$this->_id/css/$cssFileName.css";
    if(!file_exists($css_url))
    {
      return;
    }
    $css_url = Yii::app()->getAssetManager()->publish($css_url);
    Yii::app()->getClientScript()->registerCssFile($css_url);
    
    $this->RegisterCSSDependencies($cssFileName);
  }  
  
  /**
   * Returns a an array of properties with the JSON attribute in a passed in
   * ViewModel
   * @param MyViewModel $VM
   * @return array $VMJsonProperties
   */
  private static function GetJsonProperties(MyViewModel $VM)
  {
    $VMJsonProperties = array();
    $reflector = new ReflectionClass(get_class($VM));
    $reflectedProperties = $reflector->getProperties();
    foreach($reflectedProperties as $i=>$reflectedProperty)
    {
      $comment[$i] = $reflectedProperty->getDocComment();
      if(preg_match('/@attributes.*/',$comment[$i], $attributesString) === 1)
      {
        $attributes = explode(" ", $attributesString[0]);
        if(in_array("JSON", $attributes))
        {
          $propertyName = $reflectedProperty->getName();
          $VMJsonProperties[$propertyName] = $reflectedProperty->getValue($VM);
        }
      }
    }
    return $VMJsonProperties;
  }
  
  /**
   * Registers JS dependencies
   * @param string $jsFileName
   * @see BindJS 
   */
  private function RegisterJSDependencies($jsFileName)
  {
    /* @var $xml SimpleXMLElement */
    $xml = simplexml_load_file("$this->_base/assets/$this->_id/js/{$jsFileName}JS.xml");
    /* @var $requirements SimpleXMLElement */
    $requirements = $xml->children();
    /* @var $requirement SimpleXMLElement */
    foreach($requirements[0]->children() as $requirement)
    {
      $attributes = $requirement->attributes();
      "{$attributes["Root"]}" === "Base" ?
        $js_url = "$this->_base/assets/$requirement" : $js_url = "$requirement";
      $js_url = Yii::app()->getAssetManager()->publish($js_url);
      Yii::app()->getClientScript()->registerScriptFile($js_url);    
    }
  }
  
  /**
   * Registers CSS dependencies
   * @param string $cssFileName
   * @see BindCSS 
   */
  private function RegisterCSSDependencies($cssFileName)
  {
    /* @var $xml SimpleXMLElement */
    $xml = simplexml_load_file("$this->_base/assets/$this->_id/css/{$cssFileName}CSS.xml");
    /* @var $requirements SimpleXMLElement */
    $requirements = $xml->children();
    /* @var $requirement SimpleXMLElement */
    foreach($requirements[0]->children() as $requirement)
    {
      $attributes = $requirement->attributes();
      "{$attributes["Root"]}" === "Base" ?
        $css_url = "$this->_base/assets/$requirement" : $css_url = "$requirement";
      $css_url = Yii::app()->getAssetManager()->publish($css_url);
      Yii::app()->getClientScript()->registerScriptFile($css_url);    
    }
  }
  
  //</editor-fold>
  
}

?>