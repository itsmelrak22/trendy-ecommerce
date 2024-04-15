<?php
    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });



if ( isset( $_POST['add-gender-age-category'] ) && $_POST['add-gender-age-category'] ){
    $param = [
        'name' => $_POST['name'],
        'created_at' => new \DateTime,
        'updated_at' => new \DateTime,
        'created_by' => 1,
    ];

    $gender_age_category = new GenderAgeCategory;
    $result = $gender_age_category->save($param);


    header("Location: gender-age-category-list.php");
    // displayDataTest($param);
}