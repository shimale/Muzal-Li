<?php
/**
 * Company: ToXSL Technologies Pvt. Ltd. < www.toxsl.com >
 * Author : Shiv Charan Panjeta < shiv@toxsl.com >
 */

/*
 *
*
<?php

Yii::import('ext.LocationPicker.Location');

$model = new Location();
$this->widget ( 'ext.LocationPicker.LocationWidget',
		array (
				'model' => $model,
				'map_key' => 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
		));

?>

You can get your own key using Google Map API: https://code.google.com/apis/console

*/
class LocationWidget extends CWidget
{
	public $model = null;
	
	/** please set your own key*/
	public $map_key = '';
	/** @var string longitude attribute name in $model */
	public $locationAttribute = 'adress';

	/** @var string latitude attribute name in $model */
	public $latitudeAttribute = 'lat';

	/** @var string longitude attribute name in $model */
	public $longitudeAttribute = 'lng';

	/** @var string longitude attribute name in $model */
	public $zoomAttribute = 'zoom';
	

	/** @var string Label for picker link, when not set “Pick Location will be used */
	public $label = null;
	public $name ='name';
	public $email ='email';
	public $link ='link';
	public $phone ='phone';
	public $assets;
	public $list = 'list';
	public $defaultLocation = 'ראשון לציון, ישראל';
	public $defaultZoom = '10';
	/**
	 *  Publish assets and generate input ids when they is not set
	 */
	public function init()
	{
		$this->assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets'); //, false, -1, true
		$cs = Yii::app()->clientScript;
		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile('http://maps.googleapis.com/maps/api/js?key=' . $this->map_key . '&sensor=false');
		//$cs->registerScriptFile($this->assets . '/jquery-1.7.2.min.js');
		$cs->registerScriptFile($this->assets . '/jquery-gmaps-latlon-picker.js');
		$cs->registerCssFile($this->assets . '/jquery-gmaps-latlon-picker.css');
	}

	public function run()
	{

		$model = $this->model;

		if (!isset($model->{$this->locationAttribute})) $model->{$this->locationAttribute} = $this->defaultLocation;
		if (!isset($model->{$this->zoomAttribute})) $model->{$this->zoomAttribute} = $this->defaultZoom;
		


		?>



<form   action="<?php echo yii::app()->baseUrl."/insertshop" ?>" method="post">
<fieldset  class="gllpLatlonPicker">
	<div class="row">
			<?php echo CHtml::activelabelEx($model,
			$this->name); ?>
		<?php echo CHtml::activeTextField($model,$this->name); ?>
		<?php echo	CHtml::error($model,$this->name) ?>
	</div>
	<div class="row">
			<?php echo CHtml::activelabelEx($model,$this->email); ?>
		<?php echo CHtml::activeTextField($model,$this->email); ?>
		<?php echo	CHtml::error($model,$this->email) ?>
	</div>
		<div class="row">
			<?php echo CHtml::activelabelEx($model,$this->phone); ?>
		<?php echo CHtml::activeTextField($model,$this->phone); ?>
		<?php echo	CHtml::error($model,$this->phone) ?>
	</div>
		<div class="row">
			<?php echo CHtml::activelabelEx($model,$this->link); ?>
		<?php echo CHtml::activeTextField($model,$this->link); ?>
		<?php echo	CHtml::error($model,$this->link) ?>
	</div>
	<div class="row">
			<?php echo CHtml::activelabelEx($model,$this->locationAttribute); ?>
		<?php echo CHtml::activeTextField($model,$this->locationAttribute, array('class'=>'gllpSearchField gllpLocationName span4')); ?>
		<input data-theme="b" class="gllpSearchButton" value="חיפוש כתובת" type="button">
		<?php echo	CHtml::error($model,$this->locationAttribute) ?>
	</div>
		
			
		<?php echo CHtml::activehiddenField($model,$this->latitudeAttribute, array('class'=>'gllpLatitude')); ?>

			
			<?php echo CHtml::activehiddenField($model,$this->longitudeAttribute,array('class'=>'gllpLongitude')); ?>
	
		
			
			<?php echo CHtml::activehiddenField($model,$this->zoomAttribute, array('class'=>'gllpZoom')); ?>
		
	

</fieldset>
<h2> רשימת קטגוריות </h2>
					<div data-role="fieldcontain">
						<fieldset data-role="controlgroup">
							
							<?php
		
							if(isset($this->list)){
		
								foreach ($this->list as $category){
									?>
							<input type="checkbox"  value="<?php echo $category->getId() ;?> "  name="catgory[]" id="catgory_<?php echo $category->getId() ;?>" class="custom" data-mini="true" />
							 <label data-theme="a" for="catgory_<?php echo $category->getId() ;?>"><?php echo  $category -> getName()  ?></label>
							
								
								<?php
							
								}
			
							}
							?>
					     
						 </fieldset>
				
					</div>

	<input data-theme="b"  name="submit" type="submit" value="הוסף" >
</form>
<?php
	if(Yii::app()->user->hasFlash('msg')){
		printMsg();
	}
	?>

<?php
	
	}
}