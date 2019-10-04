<?php
$filepath = 'https://calm-bastion-61884.herokuapp.com/week03/personal/php/index.php';
header("Location: $filepath");
session_start();

$item = $_POST["item"];
$shopItems = getShopInventory();
$itemToAdd = array_filter($shopItems, function ($shopItem, $item) { return $shopItem->id == $item->id; }, $item);

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