<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
?>
<div class="emp-designation-index">
    <?php  
	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false; 

	if($type == 'Excel') {
		echo "<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />";
		echo "<table><tr> <th colspan='7'><h3>".$org['org_name']."</h3> </th> </tr> </table>";
	}
    ?>
    <?= GridView::widget([
        'dataProvider' => $model,
	'layout' => '{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_designation_name',
            'emp_designation_alias',
	    [
	      //'label' => 'Created At',
	      'attribute' => 'created_at',
              'value' => function ($data) {
				return Yii::$app->formatter->asDateTime($data->created_at);
			},
            ],
	    [
	      //'label' => 'Created By',
	      'attribute' => 'created_by',
              'value' => 'createdBy.user_login_id',
            ],
	    [
	      //'label' => 'Updated At',
	      'attribute' => 'updated_at',
              'value' => function ($data) {
				return (!empty($data->updated_at) ? Yii::$app->formatter->asDateTime($data->updated_at) : " (not set) ");
			},
            ],
	    [
	     // 'label' => 'Updated By',
	      'attribute' => 'updated_by',
              'value' => 'updatedBy.user_login_id',
            ],
        ],
    ]); ?>

</div>
