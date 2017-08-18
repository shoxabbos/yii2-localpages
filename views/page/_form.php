<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use shoxabbos\localpages\Module;

/* @var $this yii\web\View */
/* @var $model shoxabbos\localpages\models\Page */
/* @var $form yii\widgets\ActiveForm */
/* @var $module Module */

\shoxabbos\news\NewsAsset::register($this);

$script = <<<JS
tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
JS;

$this->registerJs($script);

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
                        echo $form->field($model, 'content_'.$key)->textarea();
                    } else {
                        echo $form->field($model, 'title_'.$key)->textInput();
                        echo $form->field($model, 'content_'.$key)->textarea();
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
