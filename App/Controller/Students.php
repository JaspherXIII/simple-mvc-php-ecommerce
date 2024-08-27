<?php
namespace App\Controller;

use App\Core\View;
use App\Model\Student;

class Students
{
    public function index()
    {
        $students = Student::getAllStudents();
        View::render('Students/index',$students);
    }

    public function add()
    {
        View::render('Students/add');
        if(isset($_POST['add'])){
            $post = array_merge($_POST, $_FILES);
            $result=Student::add($post);
            if($result){
                if(!file_exists($_FILES['image']['name'])){
                    $filename = $_FILES['image']['tmp_name'];

                    $destination = www_root.'/img/'.$_FILES['image']['name'];
                    move_uploaded_file($filename,$destination);
                }
                header('location:'.url.'Students');
            }
        }
    }

    public function edit($id = null)
    {
        $student=Student::getStudentByID($id);
        foreach ($student as $row) {
            $image = $row->image;
        }
        View::render('Students/edit',$student);
        if(isset($_POST['edit'])){
            $post = array_merge($_POST, $_FILES);
            $result=Student::edit($post);
            if($result){
                 if(!file_exists($_FILES['image']['name'])){
                    $filename = $_FILES['image']['tmp_name'];
                    $destination = www_root.'/img/'.$_FILES['image']['name'];
                    move_uploaded_file($filename,$destination);
                }
                if($image!=''){
                    if(file_exists(www_root.'/img/'.$image)){
                        unlink(www_root.'/img/'.$image);
                    }
                }
                header('location:'.url.'Students');
            }
        }
    }

    public function delete($id = null)
    {
        if(!$id==null)
        {
            $result=Student::delete($id);
            if($result){
                header('location:'.url.'Students');
            }
        }
    }
}