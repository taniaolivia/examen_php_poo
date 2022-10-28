<?php

namespace Main;

require_once('Item.php');
require_once('FreshItem.php');
require_once('ShoppingCart.php');

use Models;

$item = new Models\Item;
$item->setName("corn flakes");
$item->setPrice(500);
$item->setWeight(10000);

$chewingGum = new Models\Item;
$chewingGum->setName("chewing gum");
$chewingGum->setPrice(403);
$chewingGum->setWeight(90);

echo "<u>Items</u><br> ";
echo $item->getName() . " : " . $item->getPrice() . "€/" . $item->getWeight() . "g" ."<br>";
echo $chewingGum->getName() . " : " . $chewingGum->getPrice() . "€/" . $chewingGum->getWeight() . "g" . "<br>";

$shoppingCart = new Models\ShoppingCart;
$shoppingCart->addItem($item);
$shoppingCart->addItem($chewingGum);
//$shoppingCart->removeItem($item);

echo $shoppingCart->toString();

$shoppingCart2 = new Models\ShoppingCart;

$apple = new Models\FreshItem;
$apple->setName("apple");
$apple->setPrice(200);
$apple->setWeight(2000);
$apple->setBestBeforeDate("2022-10-31");

$shoppingCart2->addItem($apple);

echo $shoppingCart2->toString();