<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use shoxabbos\localpages\Module;
use zxbodya\yii2\tinymce\TinyMce;
use zxbodya\yii2\elfinder\TinyMceElFinder;

/* @var $this yii\web\View */
/* @var $model shoxabbos\localpages\models\Page */
/* @var $form yii\widgets\ActiveForm */
/* @var $module Module */

$module = Module::getInstance();
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput() ?>

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php foreach ($module->langs as $key => $lang) { ?>
                <li role="presentation" class="<?=$module->defaultLang == $key ? "active" : ""?>"><a href="#lang_<?=$key?>" aria-controls="#lang_<?=$key?>" role="tab" data-toggle="tab"><?=$lang?></a></li>
            <?php } ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content bg-info">
            <?php foreach ($module->langs as $key => $lang) { ?>
                <div style="padding: 10px" role="tabpanel" class="tab-pane <?=$module->defaultLang == $key ? "active" : ""?>" id="lang_<?=$key?>">
                    <?php if ($module->defaultLang == $key) {
                        echo $form->field($model, 'title')->textInput();
                        echo $form->field($model, 'content')->widget(TinyMce::className(), [
                            'fileManager' => [
                                'class' => TinyMceElFinder::className(),
                                'connectorRoute' => \yii\helpers\Url::to('connector'),
                            ],
                            'settings' => [
                                'height' => 500
                            ]
                        ]);
                    } else {
                        echo $form->field($model, 'title_'.$key)->textInput();
                        echo $form->field($model, 'content_'.$key)->widget(TinyMce::className(), [
                            'fileManager' => [
                                'class' => TinyMceElFinder::className(),
                                'connectorRoute' => \yii\helpers\Url::to('connector'),
                            ],
                            'settings' => [
                                'height' => 500
                            ]
                        ]);
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
