<?php
namespace App\Model;

use App\Core\Model;

class Student
{
    public static function getAllStudents()
    {
        $db = Model::getDB();
        $sql="SELECT * FROM students ORDER BY name";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getStudentbyID($id)
    {
        $db = Model::getDB();
        $sql="SELECT * FROM students WHERE id = :id LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = [':id'=>$id];
        $query->execute($parameters);

        return array($query->fetch());
    }


    public static function add($post)
    {
        extract($post);
        if(!empty($image['name'])){
            $image['name'] = 'no_image.png';
        }
        $db = Model::getDB();
        $sql="INSERT INTO students (id_no,name,course,year_level,image,created,modified)VALUES (:id_no,:name,:course,:year_level,:image,:created,:modified)";
        $parameters = [':id_no'=>$id_no,':name'=>$name,':course'=>$course,':year_level'=>$year_level,':image'=>$image['name'],':created'=>date('Y-m-d'),':modified'=>date('Y-m-d')];
        $query = $db->prepare($sql);
        if($query->execute($parameters)){
            return true;
        }else{
            return false;
        }
    }

    public static function edit($post)
    {
        extract($post);
        $db = Model::getDB();
        if(!empty($image['name'])){
            $sql="UPDATE students SET id_no=:id_no,name=:name,course=:course,year_level=:year_level,image=:image,modified=:modified WHERE id=:id";
            $parameters = [':id'=>$id,':id_no'=>$id_no,':name'=>$name,':course'=>$course,'year_level'=>$year_level,':image'=>$image['name'],':modified'=>date('Y-m-d')];
        }else{
            $sql="UPDATE students SET id_no=:id_no,name=:name,course=:course,year_level=:year_level,modified=:modified WHERE id=:id";
            $parameters = [':id'=>$id,':id_no'=>$id_no,':name'=>$name,':course'=>$course,'year_level'=>$year_level,':modified'=>date('Y-m-d')];
        }
        $query = $db->prepare($sql);
        if($query->execute($parameters)){
            return true;
        }else{
            return false;
        }
    }

    public static function delete($id)
    {
        $db = Model::getDB();
        $sql="DELETE FROM students WHERE id=:id";
        $parameters = array(':id'=>$id);
        $query = $db->prepare($sql);
        if($query->execute($parameters)){
            return true;
        }else{
            return false;
        }
    }
}