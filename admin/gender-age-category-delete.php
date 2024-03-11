<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  print_r($_POST);

if ( isset( $_POST['delete-gender-age-category'] ) && $_POST['delete-gender-age-category'] ){
    $id = $_POST['id'];
    $gender_age_category = new GenderAgeCategory;
    $result = $gender_age_category->delete($id);

    header("Location: gender-age-category-list.php");
    // diplayDataTest($param);
}