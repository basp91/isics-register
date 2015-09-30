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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'registration_type_id',
            'organization_name',
            'first_name',
            'last_name',
            // 'display_name',
            // 'degree',
            // 'business_phone',
            // 'fax',
            // 'email:email',
            // 'email2:email',
            // 'address1',
            // 'address2',
            // 'city',
            // 'state',
            // 'province',
            // 'zip',
            // 'country',
            // 'student_id',
            // 'payment_receipt',
            // 'emergency_name',
            // 'emergency_phone',
            // 'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
