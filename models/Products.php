<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $pr_id
 * @property string $pr_name
 * @property string $pr_description
 * @property double $pr_price
 * @property string $pr_image
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_name', 'pr_description', 'pr_price', ], 'required'],
            [['pr_price'], 'number'],
            [['pr_name'], 'string', 'max' => 55],
            [['pr_description'], 'string', 'max' => 222],
            [['pr_image'], 'string', 'max' => 111],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_id' => 'Pr ID',
            'pr_name' => 'Pr Name',
            'pr_description' => 'Pr Description',
            'pr_price' => 'Pr Price',
            'pr_image' => 'Pr Image',
        ];
    }
	
	
	
	
	
	//-------
	public static function displayProducts()
	{
		$colorClass = array("list-group-item-success", "list-group-item-info", "list-group-item-warning", "list-group-item-danger"); // bootstrap Classes
		$colorCount = 0;
		
		$query=Products::find()->orderBy ('pr_id DESC') /*->andFilterWhere(['like', 'sData_text', Yii::$app->getRequest()->getQueryParam('q')])*/  /*->where(['sData_text'=>Yii::$app->getRequest()->getQueryParam('q') ])*/ ->all();

	    foreach ($query as $dataFromCtrl) {
			//echo "<br>" . $dataFromCtrl->p r_name;
			echo '<a href="#" class="list-group-item myBtn ' . $colorClass[$colorCount]  . ' " id='  .  $dataFromCtrl->pr_name . '-' .$dataFromCtrl->pr_price .'>';   
			echo '<div class="row"><div class="col-sm-5"> <img class="prod-img" src="images/product_icon.png" alt=""/> First item : <b>' . $dataFromCtrl->pr_name . '</b> <br>';
			echo '<img class="packaging" src="images/packaging.png"/>   </div>';
			echo '<div class="col-sm-5 textX">Product text description <br>Price details : ' .$dataFromCtrl->pr_price. ' UAH</div></div></a>';
			
			if ($colorCount < 3) {
				$colorCount++;
			} else {
				$colorCount = 0;
			}
		}
	
	}
	//-----------
}
