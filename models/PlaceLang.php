<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place_lang".
 *
 * @property string $id
 * @property string $place_id
 * @property string $locality
 * @property string $coutry
 * @property string $language
 *
 * @property Place $place
 */
class PlaceLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id'], 'integer'],
            [['locality', 'coutry', 'language'], 'required'],
            [['locality', 'coutry'], 'string', 'max' => 45],
            [['language'], 'string', 'max' => 2],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['place_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'place_id' => Yii::t('app', 'Place ID'),
            'locality' => Yii::t('app', 'Locality'),
            'coutry' => Yii::t('app', 'Coutry'),
            'language' => Yii::t('app', 'Language'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }
}
