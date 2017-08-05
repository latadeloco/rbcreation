<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "libros".
 *
 * @property integer $id
 * @property string $titulo
 * @property integer $autor_autores
 * @property integer $autor_usuarios
 * @property integer $categoria
 * @property string $sinopsis
 *
 * @property Comentarios[] $comentarios
 * @property Autores $autorAutores
 * @property Categorias $categoria0
 * @property Usuarios $autorUsuarios
 * @property Valoraciones[] $valoraciones
 */
class Libro extends \yii\db\ActiveRecord
{
    /**
     * Imagen de portada
     */
    public $portada;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'libros';
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['autor_autores.nombre', 'autor_usuarios.nombre', 'autor.nombre', 'categoria.categoria']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'categoria'], 'required'],
            [['autor_autores', 'autor_usuarios', 'categoria'], 'integer'],
            [['titulo', 'sinopsis', 'autor'], 'string', 'max' => 255],
            //[['portada'], 'file', 'extension' => 'jpg,  png'],
            [['autor_autores'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor_autores' => 'id']],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria' => 'id']],
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
            'autor_autores' => 'Autor',
            'autor_usuarios' => 'Autor',
            'categoria' => 'Categoria',
            'sinopsis' => 'Sinopsis',
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

    public function getAutor()
    {
        return $this->autorAutores !== null ? $this->autorAutores : $this->autorUsuarios;
    }

    public static function getListaAutores()
    {
        //var_dump(Autor::find()->asArray()->all()); die();
        return ArrayHelper::map(Autor::find()->asArray()->all(), 'id', 'nombre');
    }

    public static function getListaAutoresUsuarios()
    {
        //var_dump(Autor::find()->asArray()->all()); die();
        return ArrayHelper::map(Usuario::find()->asArray()->all(), 'id', 'nombre');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria' ])->inverseOf('libros');
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
