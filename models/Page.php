<?php

namespace shoxabbos\localpages\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use shoxabbos\localpages\Module;
use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $slug
 *
 * @property PageContents[] $pageContents
 */
class Page extends \yii\db\ActiveRecord
{
    
    public function behaviors()
    {
        return [
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => Module::config()['langs'],
                'dynamicLangClass' => true,
                'langClassName' => Content::className(),
                'defaultLanguage' => Module::config()['defaultLang'],
                'langForeignKey' => 'page_id',
                'tableName' => "{{%".Module::config()['pagesContentTableName']."}}",
                'attributes' => [
                    'title',
                    'content',
                ]
            ],
        ];
    }

    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Module::config()['pagesTableName'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $params = [];
        foreach (Module::config()['langs'] as $key => $value) {
            if (Module::config()['defaultLang'] == $key) {
                $params[] = "title";
                $params[] = "content";
            } else {
                $params[] = "title_".$key;
                $params[] = "content_".$key;
            }
        }

        return [
            [['slug'], 'required'],
            [['slug'], 'string', 'max' => 255],
            [$params, 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['page_id' => 'id']);
    }
}
