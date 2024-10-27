<?php
// Function to calculate the total price of tickets
function calculateTotalPrice($ticketType, $numberOfTickets, $dayOfBooking)
{
    $adultTicketPrice = 50000;
    $childTicketPrice = 30000;
    $weekendSurcharge = 10000;

    // Determine base price based on ticket type
    $basePrice = ($ticketType = 'adult') ? $adultTicketPrice : $childTicketPrice;

    $totalPrice = $basePrice * $numberOfTickets;
    // Check if the booking day is a weekend
    $dayOfWeek = strtolower($dayOfBooking);
    if ($dayOfWeek == 'saturday' || $dayOfWeek == 'sunday') {
        $totalPrice += $weekendSurcharge * $numberOfTickets;
    }

    $totalPriceBeforeDiscount = $totalPrice;

    // Apply discount if total price exceeds Rp150,000
    $discountAmount = 0;
    if ($totalPrice > 150000) {
        $discountAmount = $totalPrice * 0.10; // 10% discount
        $totalPrice -= $discountAmount;
    }

    return [$totalPrice, $totalPriceBeforeDiscount, $discountAmount];
}

// Get inputs from the form
$ticketType = $_POST['ticketType'];
$numberOfTickets = (int)$_POST['numberOfTickets'];
$dayOfBooking = $_POST['dayOfBooking'];

// Calculate total price
list($totalPrice, $totalPriceBeforeDiscount, $discountAmount) = calculateTotalPrice($ticketType, $numberOfTickets, $dayOfBooking);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container summary">
    <h1>Booking Summary</h1>
    <p><strong>Ticket Type:</strong> <?php echo htmlspecialchars($ticketType); ?></p>
    <p><strong>Number of Tickets:</strong> <?php echo htmlspecialchars($numberOfTickets); ?></p>
    <p><strong>Day of Booking:</strong> <?php echo htmlspecialchars($dayOfBooking); ?></p>
    <p><strong>Total Price Before Discount:</strong>
        Rp <?php echo number_format($totalPriceBeforeDiscount, 2, ',', '.'); ?></p>
    <?php if ($discountAmount > 0): ?>
        <p><strong>Discount Applied:</strong> Rp <?php echo number_format($discountAmount, 2, ',', '.'); ?></p>
    <?php else: ?>
        <p><strong>No Discount Applied</strong></p>
    <?php endif; ?>
    <p><strong>Total Price After Discount:</strong> Rp <?php echo number_format($totalPrice, 2, ',', '.'); ?></p>

    <br>
    <p>Thank you for booking with us!</p><br>

    <div class="button-container">
        <a href="index.php" class="button">Return to Booking Form</a>
    </div>
</div>
</body>
</html>