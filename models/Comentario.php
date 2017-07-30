<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property integer $id
 * @property integer $id_usuarios
 * @property integer $id_libros
 *
 * @property Libros $idLibros
 * @property Usuarios $idUsuarios
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuarios', 'id_libros'], 'integer'],
            [['id_libros'], 'exist', 'skipOnError' => true, 'targetClass' => Libro::className(), 'targetAttribute' => ['id_libros' => 'id']],
            [['id_usuarios'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuarios' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuarios' => 'Id Usuarios',
            'id_libros' => 'Id Libros',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLibros()
    {
        return $this->hasOne(Libro::className(), ['id' => 'id_libros'])->inverseOf('comentarios');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarios()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuarios'])->inverseOf('comentarios');
    }
}
