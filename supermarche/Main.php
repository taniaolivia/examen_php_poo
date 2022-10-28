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
echo "---------------------------------------------------------------------------<br>";

$payable1 = new Models\Payable;
$payable1->label($item);
$payable1->taxRatePerTenThousand($item) . "<br/>";
$payable1->cost(10.5);

$payable2 = new Models\Payable;
$payable2->label($chewingGum);
$payable2->taxRatePerTenThousand($chewingGum) . "<br/>";
$payable2->cost(10.5);

$invoice1 = new Models\Invoice;
$invoice1->add($payable1);
$invoice1->add($payable2);
echo "<u>Invoice 1</u><br>";

foreach($invoice1->payable as $payable){
    echo $payable->label . "<br>Tax rate : " . $payable->taxRate . "<br>Cost : " . $payable->cost . "<br>";
}
echo "Total amount : " . $invoice1->totalAmount() . "<br>Total Tax : " . $invoice1->totalTax() . "<br>";

echo "---------------------------------------------------------------------------<br>";

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

echo "---------------------------------------------------------------------------<br>";

$payable3 = new Models\Payable;
$payable3->label($ticket);
$payable3->taxRatePerTenThousand($ticket) . "<br/>";
$payable3->cost(10.5);

$payable4 = new Models\Payable;
$payable4->label($apple);
$payable4->taxRatePerTenThousand($apple) . "<br/>";
$payable4->cost(10.5);

$invoice2 = new Models\Invoice;
$invoice2->add($payable3);
$invoice2->add($payable4);
echo "<u>Invoice 2</u><br>";

foreach($invoice2->payable as $payable){
    echo $payable->label . "<br>Tax rate : " . $payable->taxRate . "<br>Cost : " . $payable->cost . "<br>";
}

echo "Total amount : " . $invoice2->totalAmount() . "<br>Total Tax : " . $invoice2->totalTax();
 

