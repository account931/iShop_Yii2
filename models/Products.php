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
            [['pr_name', 'pr_description', 'pr_price', 'pr_image'], 'required'],
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
}
