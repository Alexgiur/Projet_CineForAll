<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Seats - Cineplex</title>
    <link rel="stylesheet" href="styles.css"> </head>
<body>

<div class="reservation-container">

    <header class="booking-context">
        <h1>Select Your Seats</h1>
        <p><strong>Movie:</strong> Dune: Part Two | <strong>Time:</strong> 19:30 | <strong>Screen:</strong> 4</p>
        <div id="timer-display" class="booking-timer">
            Time remaining: <span>09:55</span>
        </div>
    </header>

    <main class="seat-selection-area">

        <div class="seat-map-wrapper">
            <div class="screen-area">
                <p>SCREEN</p>
            </div>

            <div id="seat-map-grid" class="seat-map">
                <div class="row" data-row="A">
                    <span class="row-label">A</span>
                    <div class="seat available" data-id="A1" data-price="12.00">1</div>
                    <div class="seat available" data-id="A2" data-price="12.00">2</div>
                    <div class="seat booked" data-id="A3" data-price="12.00">3</div>
                    <div class="seat booked" data-id="A4" data-price="12.00">4</div>
                    <div class="seat available" data-id="A5" data-price="12.00">5</div>
                </div>

                <div class="row" data-row="B">
                    <span class="row-label">B</span>
                    <div class="seat held" data-id="B1" data-price="12.00">1</div>
                    <div class="seat available" data-id="B2" data-price="12.00">2</div>
                    <div class="seat available" data-id="B3" data-price="12.00">3</div>
                    <div class="seat available" data-id="B4" data-price="12.00">4</div>
                    <div class="seat available" data-id="B5" data-price="12.00">5</div>
                </div>

                <div class="row" data-row="C">
                    <span class="row-label">C</span>
                    <div class="seat available" data-id="C1" data-price="12.00">1</div>
                    <div class="seat available" data-id="C2" data-price="12.00">2</div>
                    <div class="seat selected" data-id="C3" data-price="12.00">3</div> <div class="seat selected" data-id="C4" data-price="12.00">4</div> <div class="seat available" data-id="C5" data-price="12.00">5</div>
                </div>

                <div class="row premium-row" data-row="D">
                    <span class="row-label">D (Premium)</span>
                    <div class="seat available premium" data-id="D1" data-price="15.00">1</div>
                    <div class="seat available premium" data-id="D2" data-price="15.00">2</div>
                    <div class="seat available premium" data-id="D3" data-price="15.00">3</div>
                    <div class="seat booked premium" data-id="D4" data-price="15.00">4</div>
                    <div class="seat available premium" data-id="D5" data-price="15.00">5</div>
                </div>

            </div>
        </div>

        <div class="legend">
            <div class="legend-item"><div class="seat-icon available"></div> Available</div>
            <div class="legend-item"><div class="seat-icon selected"></div> Selected</div>
            <div class="legend-item"><div class="seat-icon booked"></div> Booked/Unavailable</div>
            <div class="legend-item"><div class="seat-icon held"></div> Held by Another User</div>
        </div>

    </main>

    <aside class="summary-panel">
        <h2>Booking Summary</h2>

        <div class="summary-details">
            <p>Selected Seats:</p>
            <ul id="selected-seats-list">
                <li>C3 (Adult - $12.00)</li>
                <li>C4 (Adult - $12.00)</li>
            </ul>
        </div>

        <div class="total-breakdown">
            <p>Subtotal: $24.00</p>
            <p>Booking Fee: $1.00</p>
            <hr>
            <p class="grand-total">Total: <span>$25.00</span></p>
        </div>

        <button id="checkout-btn" class="checkout-button">
            Continue to Payment (2 Tickets)
        </button>
    </aside>

</div>

<script src="reservation.js"></script>
</body>
</html>
