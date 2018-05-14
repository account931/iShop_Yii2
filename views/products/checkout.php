<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

//Register my custom css/js Asset Bundle for this View only(detailed instruction in -> assets/CheckOutAssetOnly.php)
use app\assets\CheckOutAssetOnly; // using my custom asset to use modal.js/mycore.js Only in this View
CheckOutAssetOnly::register($this); // register my custom asset to use modal.js/mycore.js Only in this View (1st name-> is the name of Class)


/* @var $this yii\web\View */
/* @var $searchModel app\models\Products_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Check_Out';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.bordX {
    border: 1px solid #000000;

}
</style>

	

	

	
	
	
	
	
		
<div class="checkout-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?= Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/check.png' , $options =["id"=>"","marginleft"=>"5%",  "class"=>"rotateX","width"=>"11%","alt"=>"click","title"=>"click to add a  new  one"] ); ?>


    
	
	<?= Html::a( "Shop itself", ['/products/shop', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop', "marginleft"=>"5%",] ) ?>
    <br><br>
	
	
	<h2><?= Html::encode("Your orders") ?></h2>
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
			
			//$searchModel - is a My model derived in controller from models/ProductUserInfoForm (No SQL DB connection) for User Information input in view/products/checkout.php
			 Pjax::begin(); 
			 
			 if (Yii::$app->user->isGuest){ $d = "Guest";} else {$d = Yii::$app->user->identity->username;} // Check if Guest or not and put the ID to form
			 
			 
			 // Form Start--------------------------------------------------------------------------------------
			$form =  ActiveForm::begin([
                        'action' => [''],
                        //'method' => 'get',
                        'options' => ['id' => 'myForm', 'enableAjaxValidation' => 'true',]
                        ]); ?>

            <?= $form->field($searchModel, 'username')->textInput(['maxlength' => true, 'value'=>$d]) ?>
			<?= $form->field($searchModel, 'mobile')->textInput(['maxlength' => true]) ?>
			<?= $form->field($searchModel, 'address')->textarea(['rows' => 3]) ?> 

            <div class="form-group">
                <?= Html::submitButton('Send', ['class' => 'btn btn-success', 'id'=>'submit_id']) ?>
				
				
			<?php echo	"<br><br>" . Html::a('Your Link name','products/action', [
                            'title' => Yii::t('yii', 'Close'),
                            'onclick'=>"$('#close').dialog('open');//for jui dialog in my page
                            $.ajax({
                                type     :'POST',
                                cache    : false,
                                url  : 'products/action',
                                success  : function(response) {
                                    $('#close').html(response);
                                }
                            });return false;",
                        ]);
				?>
            </div>
            <?php ActiveForm::end(); 
			 // END Form ----------------------------------------------------------------------------------------
			 
			Pjax::end(); 
			
			
			
	
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







<?php 

$URL =Yii::$app->request->baseUrl. "/index.php?r=products/getajaxorderdata";   //WORKING,  gets the url to send ajax, defining it in  $ajax causes routing to 404, Not found, as the url address does not render correctly
//url: 'http://localhost/iShop_yii/yii-basic-app-2.0.15/basic/web/index.php?r=products/getajaxorderdata',  // the correct address sample for ajax

$Controller = Yii::$app->controller->id;

	//My working JS Register
	//Checks in JS if the Validation runs fine 
	$this->registerJs( <<< EOT_JS_CODE

  // JS code here   //afterValidate
   $("#myForm").on("beforeSubmit", function (event, messages) {
       // Now you can work with messages by accessing messages variable
       //var attributes = $(this).data().attributes; // to get the list of attributes that has been passed in attributes property
       //var settings = $(this).data().settings; // to get the settings
       //alert (attributes);
  
       var form = $(this);
	   if (form.find('.has-error').length ) {  //if validation failed
	   
	       alert("Validate failed"); 
		   return false;  //prevent submitting and reload
		   
	   } else { 
	   
	       alert("Validate OK");  //alert(<?php echo Yii::$app->request->baseUrl?> +"/products/getajaxorderdata" );
		    // runs ajax here
			//var data = $(this).serialize();
			var data = "This";
            $.ajax({
				    //url      : '<?php echo Yii::app()->createUrl("products/getajaxorderdata");?>',
				  url: '$URL',  //WORKING
				//url: form.attr('getajaxorderdata'),
                
                type: 'post',
				// dataType : "html",
				//dataType:'json', // use JSON
               
			    //passing the data to ajax
				data: {
                    controller : '$Controller ',
				    //_csrf : '<?= Yii::$app->request->csrfToken; ?>',
				    searchname : 'Dima',
                },
                success: function(res){
                    console.log(res);
				    alert (res);
				    alert (res.name); 
					alert (res.result_status);
				    textMine = res.result_status + "<br> Current Controller: " + res.controller; // formate the anwer to html
					//thml with animation
					$('.checkout-index').stop().fadeOut("slow",function(){  $('.checkout-index').html(textMine) }).fadeIn(2000);
                },
                error: function(){
                     alert('Error from View!');
                }
            });
			// END runs ajax here
		    return false; //prevent reloading/submitting
		  
	   } 
  });
  // END JS code here		

EOT_JS_CODE
);
  ////any spaces before EOT_JS_CODE will cause the crash
	?>

