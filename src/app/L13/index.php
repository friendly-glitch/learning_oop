<?php

//Итераторы, тип iterable

use App\L13\Invoice;
use App\L13\InvoiceCollection;
use App\L13\InvoiceCollection2;

//При итерации через foreach будут видны только св-ва с модификатором public
$invoice = new Invoice();
foreach($invoice as $item){
    echo $item;
}

$invoiceCollection =  new InvoiceCollection([new Invoice(),new Invoice(),new Invoice(),]);

//Прочтет массив с $invoice только если он с модификатором public. Но даже так придется делать вложенный второй foreach, чтобы пройти по свойствам каждого invoice
// foreach($invoiceCollection as $invoice){
//     var_dump($invoice);
//     echo $invoice->amount;
// }

//Реализовали интерфейс Iterable
echo "<br>";
foreach($invoiceCollection as $key => $invoice){
    echo "<br>";
    echo "$key: " . $invoice->amount;
}
//Реализовали интерфейс IteratorAggregate
echo "<br>";
$invoiceCollection2 = new InvoiceCollection2([new Invoice(),new Invoice(),new Invoice(),]);
foreach($invoiceCollection2 as $key => $invoice){
    echo "<br>";
    echo "$key: " . $invoice->amount;
}

//При использовании функций, который принимают аргумент в виде итерируемых объектов мы може указать тип iterable, чтобы можно было подставлять как массивы так и коллекции