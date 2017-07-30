<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "valoraciones".
 *
 * @property integer $id
 * @property string $valoracion
 * @property integer $id_libro
 *
 * @property Libros $idLibro
 */
class Valoracion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'valoraciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valoracion'], 'number'],
            [['id_libro'], 'integer'],
            [['id_libro'], 'exist', 'skipOnError' => true, 'targetClass' => Libro::className(), 'targetAttribute' => ['id_libro' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valoracion' => 'Valoracion',
            'id_libro' => 'Id Libro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLibro()
    {
        return $this->hasOne(Libro::className(), ['id' => 'id_libro'])->inverseOf('valoracions');
    }
}
