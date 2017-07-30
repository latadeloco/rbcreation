<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id
 * @property string $email
 * @property string $nombre
 * @property string $pass
 * @property string $token
 *
 * @property Comentarios[] $comentarios
 * @property Libros[] $libros
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'pass'], 'required'],
            [['email', 'nombre'], 'string', 'max' => 255],
            [['pass', 'token'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'nombre' => 'Nombre',
            'pass' => 'Pass',
            'token' => 'Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['id_usuarios' => 'id'])->inverseOf('idUsuarios');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::className(), ['autor_usuarios' => 'id'])->inverseOf('autorUsuarios');
    }
}
