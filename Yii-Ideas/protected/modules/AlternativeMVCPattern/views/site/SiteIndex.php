<?php /* @var $model SiteIndexVM */ ?>

<?php $this->pageTitle=Yii::app()->name; ?>

<h2>Relevant Files For this Page:</h2>

<ul>
  <li class="Bold">Controller: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/controllers/SiteController.php'; ?></tt></li>
  <li class="Bold">Model: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/models/SiteIndexVM.php'; ?></tt></li>	
  <li class="Bold">View: <tt><?php echo __FILE__; ?></tt></li>
  <li class="Bold">Javascript: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/assets/SiteIndex/js/SiteIndex.js'?></tt></li>
  <li class="Bold">CSS: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/assets/SiteIndex/css/SiteIndex.css'?></tt></li>
  <li class="Bold">Active Record One: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/data/ar/MyFakeActiveRecordOne.php'; ?></tt></li>	
  <li class="Bold">Active Record Two: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/data/ar/MyFakeActiveRecordTwo.php'; ?></tt></li>	
</ul>

<h2>New Files Relevant For all pages</h2>
  <ul>
    <li class="Bold">Parent Contoller: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/components/MyController.php'?></tt></li>
    <li class="Bold">Parent View Model: <tt><?php echo Yii::app()->getBasePath().'/modules/AlternativeMVCPattern/components/MyViewModel.php'?></tt></li>
  </ul>

<div id="ModelProperties">
  <h2>Model properties:</h2>
  <p class="Green"><?php echo $model->ColumnFromTableOne ?></p>
  <p class="Purple"><?php echo $model->ColumnFromTableTwo ?></p>
  <p class="Blue"><?php echo $model->PropertyNotBountToJavascript ?></p>
</div>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>