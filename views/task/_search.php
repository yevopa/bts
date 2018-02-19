<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'create_date') ?>

    <?= $form->field($model, 'finish_date') ?>

    <?php // echo $form->field($model, 'plan_date') ?>

    <?php // echo $form->field($model, 'tasktype_id') ?>

    <?php // echo $form->field($model, 'taskpriority_id') ?>

    <?php // echo $form->field($model, 'taskstatus_id') ?>

    <?php // echo $form->field($model, 'sprint_id') ?>

    <?php // echo $form->field($model, 'version_id') ?>

    <?php // echo $form->field($model, 'resolved_version_id') ?>

    <?php // echo $form->field($model, 'detected_version_id') ?>

    <?php // echo $form->field($model, 'performer_id') ?>

    <?php // echo $form->field($model, 'owner_id') ?>

    <?php // echo $form->field($model, 'parenttask_id') ?>

    <?php // echo $form->field($model, 'relatedtask_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
