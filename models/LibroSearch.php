<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Libro;

/**
 * LibroSearch represents the model behind the search form about `app\models\Libro`.
 */
class LibroSearch extends Libro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categoria', 'autor_autores', 'autor_usuarios'], 'integer'],
            [['titulo', 'sinopsis', 'autor_autores.nombre', 'autor_usuarios.nombre', 'autor.nombre'], 'safe'],
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
        $query = Libro::find();
        $query->leftJoin([
            'autores'
        ], 'autores.id = libros.id');
        $query->leftJoin([
            'usuarios'
        ], 'usuarios.id = libros.id');
        $query->leftJoin([
            'categorias'
        ], 'categorias.id = libros.id');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes'=>[
                'id',
                'titulo',
                'categoria.id',
                'autor.nombre'
            ]
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'categorias.id' => $this->categoria,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
                ->andFilterWhere(['ilike', 'autores.nombre',
                        $this->getAttribute('autor.nombre')])
            ->andFilterWhere(['like', 'sinopsis', $this->sinopsis]);

        return $dataProvider;
    }
}
