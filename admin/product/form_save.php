<?php
if (!empty($_POST)) {
    $id = getPost('id');
    $pname = getPost('pname');
    $price = getPost('price');
    $discount = getPost('discount');
    $thumbnail = getPost('thumbnail');
    $size = getPost('size');
    $description = getPost('description');
    $category_id = getPost('category_id');
    $min_age = getPost('min_age');
    $created_at = $updated_at = date('Y-m-d H:S:I');

    if ($id > 0) {
        //update
        $sql = "update Product set pname = '$pname',min_age = '$min_age' ,price = '$price', thumbnail = '$thumbnail', 
                    discount = '$discount', description = '$description', size = '$size',category_id = '$category_id', updated_at = '$updated_at' where id = $id";
        excute($sql);

    } else {
        //insert
        $sql = "insert into Product(pname, price, thumbnail, 
                    discount, description, size, updated_at, created_at, deleted, category_id,min_age) values 
                    ('$pname', '$price', '$thumbnail', '$discount',
                     '$description', '$size', '$updated_at', '$created_at', 0, $category_id,$min_age)";
        excute($sql);
        header('Location: index.php');
        die();
    }
}