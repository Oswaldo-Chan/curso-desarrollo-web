<?php

namespace App;

class ActiveRecord {
    //database
    protected static $db;
    protected static $table = '';
    protected static $dbColumns = [];
    
    protected static $errors = [];   
    
    //getters and setters
    public static function setDB($db) {
        self::$db = $db;
    }
    public function setImage($image){
    
        if (!is_null($this->id)) {
            $this->deleteImage();
        }
    
        if ($image) {
            $this->image = $image;
        }
    }
    public static function getErrors() {
        return static::$errors;
    }
    public static function get($limit) {
        $query = "SELECT * FROM ".static::$table." LIMIT ".$limit;
        $result = self::SQLQuery($query);
    
        return $result;
    }
    
    //methods
    public function save() {
        if (!is_null($this->id)) {
            $this->update();
        } else {
            $this->create();
        }
    }
    protected function create() {
        $attributes = $this->sanitizeAttributes();
    
        $query = " INSERT INTO ".static::$table." ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ')";
        $result = self::$db->query($query);
    
        if ($result) {
            header('Location: /admin?result=1');
        }
    }
    protected function update() {
        $attributes = $this->sanitizeAttributes();
    
        $values = [];
        foreach ($attributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }
        join(', ', $values);
        $query = "UPDATE ".static::$table." SET ";
        $query.= join(', ', $values);
        $query.= " WHERE id = '".self::$db->escape_string($this->id)."' ";
        $query.= "LIMIT 1";
    
        $result = self::$db->query($query);
    
        if ($result) {
            header('Location: /admin?result=2');
        }
    }
    public function delete() {
        //delete
        $query = "DELETE FROM ".static::$table." WHERE id = ".self::$db->escape_string($this->id)." LIMIT 1";
        $result = self::$db->query($query);
    
        if ($result) {
            $this->deleteImage();
            header('Location: /admin?result=3');
        }
    }
    public function deleteImage(){
        $exists = file_exists(FOLDER_IMG.$this->image);
    
        if ($exists) {
            unlink(FOLDER_IMG.$this->image);
        }
    }
    public function attributes() {
        $attributes = [];
    
        foreach(static::$dbColumns as $column) {
            if($column === 'id') continue;
            $propertyName = static::getPropertyForColumn($column);
            $attributes[$column] = $this->$propertyName;
        }
        return $attributes;
    }
    public function sanitizeAttributes() {
        $attributes = $this->attributes();
        $sanitized = [];
    
        foreach($attributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
    
        return $sanitized;
    }
    public function validate(){
        static::$errors = [];
        return static::$errors;
    }
    public static function all() {
        $query = "SELECT * FROM ".static::$table;
    
        $result = self::SQLQuery($query);
    
        return $result;
    }
    public static function find($propertyID) {
        $query = "SELECT * FROM ".static::$table." WHERE id = {$propertyID}";
        $result = self::SQLQuery($query);
    
        return array_shift($result);
    }
    public static function SQLQuery($query) {
        $result = self::$db->query($query);
        $array = [];
        while ($record = $result->fetch_assoc()) {
            $array[] = static::createObject($record);
        }
        $result->free();
        return $array;
    }
    protected static function createObject($record) {
        $object = new static;
        
        foreach ($record as $key => $value) {
            $propertyName = static::getPropertyForColumn($key);
            if (property_exists($object, $propertyName)) {
                $object->$propertyName = $value;
            }
        }
    
        return $object;
    }
    public function sync($args = []) {
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}