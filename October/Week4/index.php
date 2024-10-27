<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Movie Ticket Booking</h1>
    <form action="process-booking.php" method="POST">
        <div class="form-group">
            <label for="ticketType"><b>Ticket Type</b></label>
            <select name="ticketType" id="ticketType" required>
                <option value="Adult">Adult - Rp 50,000</option>
                <option value="Child">Child - Rp 30,000</option>
            </select>
        </div>

        <div class="form-group">
            <label for="numberOfTickets"><b>Number of Tickets</b></label>
            <input type="number" name="numberOfTickets" id="numberOfTickets" min="1" required>
        </div>

        <div class="form-group">
            <label for="dayOfBooking"><b>Day of Booking</b></label>
            <input type="text" name="dayOfBooking" id="dayOfBooking" placeholder="Additional price Rp10.000 for weekend" required>
        </div>

        <input type="submit" value="Calculate Price">
    </form>
</div>
</body>
</html>