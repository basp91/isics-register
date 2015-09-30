<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registration;

/**
 * RegistrationSearch represents the model behind the search form about `app\models\Registration`.
 */
class RegistrationSearch extends Registration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'registration_type_id', 'zip'], 'integer'],
            [['organization_name', 'first_name', 'last_name', 'display_name', 'degree', 'business_phone', 'fax', 'email', 'email2', 'address1', 'address2', 'city', 'state', 'province', 'country', 'student_id', 'payment_receipt', 'emergency_name', 'emergency_phone', 'token'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Registration::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'registration_type_id' => $this->registration_type_id,
            'zip' => $this->zip,
        ]);

        $query->andFilterWhere(['like', 'organization_name', $this->organization_name])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'display_name', $this->display_name])
            ->andFilterWhere(['like', 'degree', $this->degree])
            ->andFilterWhere(['like', 'business_phone', $this->business_phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email2', $this->email2])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'student_id', $this->student_id])
            ->andFilterWhere(['like', 'payment_receipt', $this->payment_receipt])
            ->andFilterWhere(['like', 'emergency_name', $this->emergency_name])
            ->andFilterWhere(['like', 'emergency_phone', $this->emergency_phone])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}
