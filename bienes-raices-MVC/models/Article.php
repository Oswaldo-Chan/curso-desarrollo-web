<?php

namespace Model;

class Article extends ActiveRecord {
    protected static $table = 'blog';
    protected static $dbColumns = ['id','autor','fecha','titulo','descripcion','contenido','imagen'];

    public  $id;
    public $author;
    public $date;
    public $title;
    public $description;
    public $content;
    public $image;

    public function __construct($args = [])
    {  
        $this->id = $args['id'] ?? null;
        $this->author = $args['author'] ?? '';
        $this->date = date('Y/m/d');
        $this->title = $args['title'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->content = $args['content'] ?? '';
        $this->image = $args['image'] ?? '';
    }
    public function validate(){
        if (!$this->author) {
            self::$errors[] = "Debes agregar un titulo";
        }
        if (!$this->title) {
            self::$errors[] = "Debes elegir un autor";
        } 
        if (!$this->description) {
            self::$errors[] = "Necesitas agregar una descripcion";
        } else if (strlen($this->description) < 20) {
            self::$errors[] = "La descripcion debe tener al menos 20 caracteres";
        } else if (strlen($this->description) > 200) {
            self::$errors[] = "La descripcion no debe exceder los 200 caracteres";
        }
        if (!$this->content) {
            self::$errors[] = "El contenido es obligatorio";
        } 
        if (!$this->image) {
            self::$errors[] = "La imagen es obligatoria";
        } 
  
        return self::$errors;
    }   
    protected static function getPropertyForColumn($column) {
        switch ($column) {
            case 'id':
                return 'id';
            case 'autor':
                return 'author';
            case 'fecha':
                return 'date';
            case 'titulo':
                return 'title';
            case 'descripcion':
                return 'description';
            case 'contenido':
                return 'content';
            case 'imagen':
                return 'image';
            default:
                return null;
        }
    }
}