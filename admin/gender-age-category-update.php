<?php
    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });



if ( isset( $_POST['edit-gender-age-category'] ) && $_POST['edit-gender-age-category'] ){
    $id = $_POST['id'];
    $param = [
        'name' => $_POST['name'],
        'updated_at' => new \DateTime,
    ];

    $gender_age_category = new GenderAgeCategory;
    $result = $gender_age_category->update($param, $id);


    header("Location: gender-age-category-list.php");
    // diplayDataTest($param);
}