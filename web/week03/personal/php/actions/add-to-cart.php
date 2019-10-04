<?php
session_start();
$filepath = 'https://calm-bastion-61884.herokuapp.com/week03/personal/php/index.php';
// header("Location: $filepath");

$id = $_REQUEST["id"];
echo($id . "<br>"); ///////////////////////////
$shopItems = getShopInventory();
print_r($shopItems . "<br>"); //////////////////////////////
$itemToAdd = array_filter($shopItems, function ($shopItem, $id) { return $shopItem->id == $id; }, $id);
echo($itemToAdd->name . "<br>");

array_push($_SESSION["cart"], $itemToAdd[0]);




function getShopInventory() {
    $shopItemsDir = __DIR__ . '/../../data/shop-items.json';

    $shopItemsFile = fopen($shopItemsDir, "r") or die("Unable to open file!");
    $shopItemsJson = fread($shopItemsFile, filesize($shopItemsDir));
    fclose($shopItemsFile);
    
    $shopItems = json_decode($shopItemsJson);
    return $shopItems;
}
?>