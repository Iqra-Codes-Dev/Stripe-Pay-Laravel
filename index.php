<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Custom Stripe Payment</title>

</head>
<body>

<form action="{{ route('session') }}" method="POST">
    @csrf
    <h2>Enter Your Amount</h2>
    <input type="number" name="amount" placeholder="Enter amount in USD" required>
    <button type="submit">Pay Now</button>
</form>

</body>
</html>
