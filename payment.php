<?php

class BusTicketPayment {
    private $ticketPrice = 0;
    private $paymentMethods = ["cash", "credit card", "debit card", "mobile wallet"];

    public function setTicketPrice($price) {
        $this->ticketPrice = $price;
    }

    public function displayPaymentMethods() {
        echo "Available payment methods:\n";
        foreach ($this->paymentMethods as $index => $method) {
            echo ($index + 1) . ". " . ucfirst($method) . "\n";
        }
    }

    public function processPayment($method, $amount) {
        if (!in_array(strtolower($method), $this->paymentMethods)) {
            return [false, "Invalid payment method"];
        }

        if ($amount < $this->ticketPrice) {
            return [false, "Insufficient payment"];
        }

        $change = $amount - $this->ticketPrice;
        $timestamp = date("Y-m-d H:i:s");

        $message = "
        Payment successful!
        Method: " . ucfirst($method) . "
        Amount paid: $" . number_format($amount, 2) . "
        Ticket price: $" . number_format($this->ticketPrice, 2) . "
        Change: $" . number_format($change, 2) . "
        Timestamp: $timestamp
        ";

        return [true, $message];
    }
}

// Example usage
$paymentSystem = new BusTicketPayment();
$paymentSystem->setTicketPrice(2.50);

$paymentSystem->displayPaymentMethods();

echo "Enter payment method: ";
$method = trim(fgets(STDIN));

echo "Enter payment amount: ";
$amount = floatval(trim(fgets(STDIN)));

list($success, $message) = $paymentSystem->processPayment($method, $amount);
echo $message;

?>