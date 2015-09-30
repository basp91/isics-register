<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Registration */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'registration_type_id',
            'organization_name',
            'first_name',
            'last_name',
            'display_name',
            'degree',
            'business_phone',
            'fax',
            'email:email',
            'email2:email',
            'address1',
            'address2',
            'city',
            'state',
            'province',
            'zip',
            'country',
            'student_id',
            [
                'attribute' => 'payment_receipt',
                'format'=>'raw',
                'value'=>Html::a('pago', '@web/files/payment/'.$model->payment_receipt),
            ],
            'emergency_name',
            'emergency_phone',
            'token',
        ],
    ]) ?>

</div>
