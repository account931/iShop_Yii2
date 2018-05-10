<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

//Register my custom css/js Asset Bundle for this View only(detailed instruction in -> assets/CheckOutAssetOnly.php)
use app\assets\CheckOutAssetOnly; // using my custom asset to use modal.js/mycore.js Only in this View
CheckOutAssetOnly::register($this); // register my custom asset to use modal.js/mycore.js Only in this View (1st name-> is the name of Class)


/* @var $this yii\web\View */
/* @var $searchModel app\models\Products_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Check_Out';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="checkout-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?= Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/check.png' , $options =["id"=>"","marginleft"=>"5%",  "class"=>"rotateX","width"=>"11%","alt"=>"click","title"=>"click to add a  new  one"] ); ?>


    
	
	<?= Html::a( "Shop itself", ['/products/shop', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop', "marginleft"=>"5%",] ) ?>
    <br><br>
	
	
	
	
	
	    <!---------------------User's order list from JS object, filled with checkout.php------------->
	    <div class="checkList">
		</div><!--END <div class="checkList">-->
		<br><br>
		<!---------------------User's order list from JS object, filled with checkout.php------------->
		
		
		
		
		
		
		
		<!---------------------USER DETAILS FORM------------->
		<div class="checkUserContactForm">
		    <h2><?= Html::encode('Customer Check-out information') ?></h2>
			
		    <?php
            // Start if  Person is  LOGGED-------
            // **************************************************************************************
            // **************************************************************************************
            //                                                                                     **
			
			$form = ActiveForm::begin(); ?>

            <?= $form->field($searchModel, 'q')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end();
			
	
            if (!Yii::$app->user->isGuest){
			
			// End if  Person is   logged
                                                                                             
            } else {  // Start if  Person is  not  logged
			    echo "<br><br>";
                echo Html::encode("You are not logged. In order to see your order in future, please ");
                echo Html::a( "log in to view orders", ['/site/login', 'traceURL' => "logTime",   ] /* $url = null*/, $options = ['title' => 'Login',] ); 
            }
			
            // **                                                                                  **
            // **************************************************************************************
            // **************************************************************************************         
            // END if  Person is  not  logged
			?>
		</div><!--END <div class="checkUserContactForm">-->
		<!---------------------USER DETAILS FORM------------->
		
		
		
		
   
</div> <!-- <div class="checkout-index">-->
