<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	
	<style> <!-- Start Responsive-->
  .topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:not(.menuForm):hover  {
  background-color: white;
  color: black;
}

.activeZ {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {  /* was 600 */
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {  /* was 600 */
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}



  </style><!-- End Responsive-->
</head>
<body>
<?php $this->beginBody() ?>  <!-- Left from original-->



    <!-- added original Yii2 wrap div to suppres the footer to bottom, this div is closed before footer----->
    <div class="wrap"> <!-- Left from original-->
	
	
	
	
	
	<!----------Start Injected Menu---------------->
	<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
  
        <!--------------------- Responsive Header menu----------------------->
	    <div class="topnav" id="myTopnav">
			<?= Html::a( "Home", ['/site/index', 'period' => "",   ] /* $url = null*/, $options = ['class'=>'activeZ', 'id'=>'home', 'title' => 'Go home',] ) ?>
            <!--<a href="#home" class="active" id="home">Home</a>-->
			<?= Html::a( "PControlrol", ['/products/index', 'period' => "",   ] /* $url = null*/, $options = ['class'=>'', 'title' => 'Go home',] ) ?>
			<?= Html::a( "About", ['/site/about', 'period' => "",   ] /* $url = null*/, $options = ['class'=>'', 'title' => 'About us',] ) ?>
			<?= Html::a( "Contact", ['/site/contact', 'period' => "",   ] /* $url = null*/, $options = ['class'=>'', 'title' => 'Contact us',] ) ?>
		    <?= Html::a( "iShop", ['/products/shop', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop',] ) ?>
			<?= Html::a( "CheckOut", ['/products/checkout', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop',] ) ?>
			<?= Html::a( "Placed", ['/products/checkout', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop',] ) ?>
			<?= Html::a( "Admin", ['/products/checkout', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Shop',] ) ?>
			
			<?php 
			if (Yii::$app->user->isGuest) {
		        echo Html::a( "Login", ['/site/login', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Login',] );
            } else {  //display Log out
                //echo Html::a( 'Logout (' . Yii::$app->user->identity->username . ')' , ['/site/logout', 'post', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Login',] );
                echo '<a>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
					
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => ' btn-link logout']   //['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</a>';
			}
			?>

	  
	        <!---Search input--->
	        <a href="" class="menuForm">
	            <input type="text" class="" placeholder="Search" name="search">
                <button class="" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
	        </a>
	  
	    <!--Mine BASKET -->
	    <a href="#aboutZ" style="float: right;>
	        <span class="">Cart: </span>
            <span id="cartPrice"> &nbsp;0 UAH</span> 
         </a>
	    <!-- End mine Basket-->
	
	    <!-- Must be the last element in menu, that is the invisible in desktop icon-->
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>

        <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                 x.className = "topnav";
            }
        }
        </script>
	    <!--End Responsive header menu-->
	
	
        </div>
    </nav>
 
    <!----------END Injected Menu---------------->
	
	
	
	
	


  
	 
	<!-- Left from original-->
    <div class="container"> 
	
	<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        
        <?= $content ?>
    
    </div>
    <!-- END Left from original-->


    
	</div><!--<div class="wrap">--> <!-- Left from original-->
	
	
	
	<!-- Left from original-->
	<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Dima F / <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
    </footer>
	<!-- END Left from original-->


<?php $this->endBody() ?> <!-- Left from original-->
</body>
</html>
<?php $this->endPage() ?>
