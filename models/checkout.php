<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Products_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Check_Out';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?= Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/check.png' , $options =["id"=>"","marginleft"=>"5%",  "class"=>"rotateX","width"=>"11%","alt"=>"click","title"=>"click to add a  new  one"] ); ?>


    
	
	<?= Html::a( "Shop itself", ['/products/shop', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop', "marginleft"=>"5%",] ) ?>
	


    <br><br>
   
</div>
