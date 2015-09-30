<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Registration'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'registration_type_id',
            [
                'attribute'=> 'display_name',
                'format'=>'raw',
                'value'=> function($dataProvider){
                    return Html::a($dataProvider->display_name, ['registration/view', 'id'=>$dataProvider->id]);
                }
            ],
            'organization_name',
            'email:email',
            'country',
            // 'student_id',
            'payment_receipt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
