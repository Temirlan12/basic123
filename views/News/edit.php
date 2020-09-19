<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin([]); ?>
<?= $form->field($model,'title') ?>
<?= $form->field($model,'text') ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end();?>














