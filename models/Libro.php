<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $portada
 * @property integer $autor_autores
 * @property integer $autor_usuarios
 *
 * @property Comentarios[] $comentarios
 * @property Autores $autorAutores
 * @property Usuarios $autorUsuarios
 * @property Valoraciones[] $valoraciones
 */
class Libro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['autor_autores', 'autor_usuarios'], 'integer'],
            [['titulo', 'portada'], 'string', 'max' => 255],
            [['autor_autores'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor_autores' => 'id']],
            [['autor_usuarios'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['autor_usuarios' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'portada' => 'Portada',
            'autor_autores' => 'Autor Autores',
            'nombreAutores' => 'Autor',
            'autor_usuarios' => 'Autor Usuarios',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_libros' => 'id'])->inverseOf('idLibros');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorAutores()
    {
        return $this->hasOne(Autor::className(), ['id' => 'autor_autores'])->inverseOf('libros');
    }

    public function getNombreAutores()
    {
        return Autor::find()->select('nombre')->where(['id' => '1'])->scalar();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorUsuarios()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'autor_usuarios'])->inverseOf('libros');
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValoraciones()
    {
        return $this->hasMany(Valoracion::className(), ['id_libro' => 'id'])->inverseOf('idLibro');
    }
}
