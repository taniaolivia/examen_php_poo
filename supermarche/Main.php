<?php

namespace Main;

require_once('Item.php');
require_once('FreshItem.php');
require_once('Ticket.php');
require_once('ShoppingCart.php');
require_once('Payable.php');
require_once('Invoice.php');

use Models;

$item = new Models\Item;
$item->setName("Corn flakes");
$item->setPrice(500);
$item->setWeight(100);

$chewingGum = new Models\Item;
$chewingGum->setName("Chewing gum");
$chewingGum->setPrice(403);
$chewingGum->setWeight(90);

/*echo "<u>Items</u><br> ";
echo $item->getName() . " : " . $item->getPrice() . "€/" . $item->getWeight() . "g" ."<br>";
echo $chewingGum->getName() . " : " . $chewingGum->getPrice() . "€/" . $chewingGum->getWeight() . "g" . "<br>";*/

$shoppingCart = new Models\ShoppingCart;
$shoppingCart->addItem($item);
$shoppingCart->addItem($chewingGum);
//$shoppingCart->removeItem($item);

echo $shoppingCart->toString();

$shoppingCart2 = new Models\ShoppingCart;

$apple = new Models\FreshItem;
$apple->setName("Apple");
$apple->setPrice(670);
$apple->setWeight(200);
$apple->setBestBeforeDate("2022-10-31");

$ticket = new Models\Ticket;
$ticket->setReference("RGBY17032012 - Walles-France");
$ticket->setPrice(9000);

$shoppingCart2->addItem($apple);
$shoppingCart2->addItem($ticket);

echo $shoppingCart2->toString();

$payable = new Models\Payable;
$payable->taxRatePerTenThousand($ticket) . "<br/>";
$payable->cost(10.5);

$payable2 = new Models\Payable;
$payable2->taxRatePerTenThousand($apple) . "<br/>";
$payable2->cost(10.5);

$invoice = new Models\Invoice;
$invoice->add($payable);
$invoice->add($payable2);

