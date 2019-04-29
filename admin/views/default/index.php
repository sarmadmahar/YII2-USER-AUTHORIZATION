<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
?>
<div class="admin-default-index">

    <p class="text-danger"><?php echo $msg;?></p>

<div class="panel panel-primary">
    <div class="panel-heading">
       <span class="glyphicon glyphicon-user"></span> Manage User Authorization
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'form-inline'
                ]
            ]
        ); ?>
        <?= $form->field($model, 'AUTH_DESC')->textInput(['maxlength' => true]) ?>
        <?php echo $form->field($model, 'AUTH_TYPE')->dropDownList(array("user"=>"User","group"=>"Group"));?>
        <?= $form->field($model, 'PAGE')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-floppy-disk"></span>'.' Save', ['class' => 'btn btn-success','style'=>'margin-bottom:10px']) ?>
    </div>
    <?php ActiveForm::end(); ?>
        <small class="text-danger"><span class="glyphicon glyphicon-bell"></span> Hint: User Name/Group Must be case sensative</small>
    </div>

</div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user"></span> User/Group Permissions
        </div>
        <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'AUTH_DESC',
            'AUTH_TYPE',
            'PAGE'
        ],
    ]) ?>
        </div>
    </div>
</div>
