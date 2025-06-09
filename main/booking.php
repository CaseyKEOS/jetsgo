<?php

if(isset($_POST['book'])){

    $id = $_GET['imgID'];
    $imgN = $_GET['imgName'];
    $promo = $_GET['promoName'];
    $country = $_GET['countryName'];
    $price = $_GET['pPrice'];

    header('Location: book.php;');

}

?>