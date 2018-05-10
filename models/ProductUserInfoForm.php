<?php
//Search model for Support CR's knowledge base
namespace app\models;
use Yii;
use yii\base\Model;

//Search form for searching
class ProductUserInfoForm extends Model
{
    public $q;
   
    private $_user = false;
	
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
		
		 // username and password are both required
            [['q', ], 'required'],
            
            ['q', 'string', 'message'=>'your text'],
           
        ];
    }
	
    public function attributeLabels()
    {
        return [
            'q' => 'Name',
            
        ];
    }
}
?>