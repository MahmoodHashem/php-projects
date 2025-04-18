<?php

define("TAX_RATE", 0.15);

define("DISCOUNT", 0.2);
define("SHIPPING_COST", 10);
$discountApplied = false;


function calculateSubtotal(float $price, int $quantity): float
{
    return $quantity * $price;
}

function calculateTax(float $subtotal): float
{
    return ($subtotal * TAX_RATE);
}

function calculateDiscount(float $subtotal, bool &$discount_applied): float
{
    if ($subtotal >= 1000) {
        $discount_applied = true;
        return ($subtotal * DISCOUNT);
    } else {
        $discount_applied = false;
        return 0;
    }
}

function calculateShipping(float $amount): ?float
{

    if ($amount > 100) {
        return 0;
    } elseif ($amount > 50) {
        return SHIPPING_COST;
    } else {
        return null;
    }
}

function processSingleOrder(string $customerName, float $price, int $quantity): array
{
    global $discountApplied;

    $result = [];
    $result["customer"] = $customerName;
    $result["price"] = $price;
    $result["quantity"] = $quantity;
    $result["subtotal"] = calculateSubtotal($price, $quantity);
    $result["discount_amount"] = calculateDiscount($result["subtotal"], $discountApplied);
    $result["discount_applied"] = $discountApplied;
    $result["tax_amount"] = calculateTax($result["subtotal"]);
    $result["shipping_cost"] = calculateShipping($result["subtotal"]);
    $result["payable"] = ($result["subtotal"] - $result["discount_amount"]) + $result["tax_amount"];
    return $result;
}



$orders = [
    [
        'order_id' => 1001,
        'customer' => 'Mahmood Hashemi',
        'product_name' => 'Smartphone 128GB',
        'price' => 100.99,
        'quantity' => 2
    ],
    [
        'order_id' => 1002,
        'customer' => 'Ahmad',
        'product_name' => 'Laptop Latitude 5000',
        'price' => 500.99,
        'quantity' => 1
    ],
    [
        'order_id' => 1003,
        'customer' => 'Ali Rezaei',
        'product_name' => 'Smartwatch Series 6',
        'price' => 54.99,
        'quantity' => 5
    ],
];

function processOrders(array $orders): array
{
    $allOrders = [];
    foreach ($orders as $key => $value) {
        $result = processSingleOrder($value['customer'], $value['price'], $value['quantity']);

        $allOrders[$key] = $result;
    }
    return $allOrders;
}

$processedOrders = processOrders($orders);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../output.css">
    <title>Document</title>
</head>

<body>
    <h1 class="text-3xl  font-bold text-center mb-6">Order Processing Summary</h1>
    <div class="grid grid-1 md:grid-cols-3 gap-2">
        <?php foreach ($processedOrders as $orderKey => $order): ?>
            <div class="w-full max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
                <h1 class="text-2xl font-bold text-gray-800 mb-4"><?= $order['customer'] ?></h1>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Item</th>
                            <th class="border border-gray-300 px-4 py-2 text-right">Details</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Price Item:</td>
                            <td class="border border-gray-300 px-4 py-2 text-right"><?= $order["price"] ?>$</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Quantity:</td>
                            <td class="border border-gray-300 px-4 py-2 text-right"><?= $order["quantity"] ?></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Subtotal:</td>
                            <td class="border border-gray-300 px-4 py-2 text-right"><?= $order["subtotal"] ?></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Discount Amount:</td>
                            <td class="border border-gray-300 px-4 py-2 text-right"><?= $order["discount_amount"] ?>$</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Tax Amount:</td>
                            <td class="border border-gray-300 px-4 py-2 text-right"><?= $order["tax_amount"] ?>$</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 font-bold">Total Payable:</td>
                            <td class="border border-gray-300 px-4 py-2 text-right font-bold text-green-600"><?= $order["payable"] ?>$</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>