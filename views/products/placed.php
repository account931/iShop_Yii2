<?php

// Display all placed Orders with status 0, intended for Admin Only
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = "Submitted Orders";
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<h3><?= Html::encode("Display all submitted placed Orders with status 0, intended for Admin Only") ?></h3>
	
	<?php
	var_dump($query);
	
	echo "<br>->" . $query[0]['b_mobile'] . "<br>";
	
	/* Works but can be sorted
	array_walk_recursive($query, function ($item, $key) {
        echo "<br>$key = $item\n";
    });
    */
      
	  
	//---
	$counter = 0;
	//echo "<br><hr>Customer: " . $query[$counter]['b_name'] . "<br>Order ID: " . $query[$counter]['b_order_unique_id'] . "<br>" ;
	foreach($query as $key => $value){
		
			++$counter;
		    echo "<script>alert($counter);</script>";
			
		    echo "<br><hr>Customer: " . $query[$counter]['b_name'] . "<br>Order ID: " . $query[$counter]['b_order_unique_id'] . "<br>" ;
		
		
		
        if(is_array($value)){
			
			
            foreach( array_slice($value, 5)  as $key => $value){  //array_slice($value, 3)   - skipp first 4 iteration
			
                echo $key." :".$value."<br>";
				
            }
        }
        echo "<br>";
    }
	//----
	
	?>
	
</div>
