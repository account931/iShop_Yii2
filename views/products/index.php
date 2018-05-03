<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Products_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	<?= Html::a( "Shop itself", ['/products/shop', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop',] ) ?>

    <br><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pr_id',
            'pr_name',
            'pr_description',
            'pr_price',
            'pr_image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
