<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
}

.receipt-container {
    padding: 20px;
}

.divider {
    width: 100%;
    height: 1px;
    margin: 6px 0px;
    border: 1px dotted gray;
    opacity: 0.6;
}

.receipt-top,
.customer-details,
.service-details,
.pricing-details,
.payment-information {
    margin-bottom: 20px;
}

.price-lt{
    width: 20%;
}
.price-row {
    width: 100%;
    display: flex;
    justify-content: space-between;
    gap: 10px;
}
li{
    list-style-type: decimal;
}
.dots {
    width: 60%;
}

.company h3{
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-style: italic;
    display:inline-block;
    cursor: pointer;
    font-size:30px;
    margin-bottom:-10px;
}
.company .aqua{
    color:red;
}
.company .clean{
    color:blue;
    margin-left: -4px;
}

</style>
<body>

    <div class="receipt-container">
        <center>
                        <div class="company">
                            <h3 class="aqua">Aqua</h3>
                            <h3 class="clean">Clean</h3>
                        </div>
            <div class="header">
                <span>Location: Teshie Bush-Road</span><br>
                <span>Phone: (+233) 59-395-8236</span><br>
                <span>Email: info@aquaclean.com</span><br>
                <hr class="divider">
            </div>
        </center>

        <div class="receipt-body">
            <div class="receipt-top">
                <span>Receipt No:</span><span id="carwash_receipt"> {{$query->car_invoice}}</span><br>
                <span>Date:</span> <span id="current_date">{{ now()->format('Y-m-d') }}</span><br>
                <span>Time:</span> <span id="current_time">{{ now()->format('h:i a') }}</span>
            </div>

            <div class="customer-details">
                <strong>Customer Information:</strong><br>
                <span>Name: {{$query->customer_name}}</span><br>
                <span>Phone: {{$query->customer_number}}</span><br>
            </div>

            <div class="service-details">
                <strong>Service Details:</strong><br>
                {{$query->service}}
            </div>

            <div class="pricing-details">
                <div class="price-row">
                    <span class="price-lt">Subtotal:</span>
                    <span class="dots">......................................................................</span>
                    <span>$30</span>
                </div>
                <div class="price-row">
                    <span class="price-lt">Tax (7%):</span>
                    <span class="dots">.....................................................................</span>
                    <span>$5</span>
                </div>
                <div class="price-row">
                    <strong class="price-lt">Total Amount:</strong>
                    <span class="dots">............................................................</span>
                    <strong>${{$query->amount}}</strong>
                </div>
            </div>

            <div class="payment-information">
                <strong>Payment Information:</strong><br>
                <span>
                    Payment Method: {{$query->payment}} <br>
                    Cardholder Name: {{$query->customer_name}} <br>
                </span>
            </div>

            <center>
                <div class="receipt-footer">
                    <hr class="divider">
                    <span>
                        <strong>Thank you for choosing AuaClean!</strong> <br>
                        We appreciate your business. For inquiries, please contact us at (+233) 59-395-8236
                        or email us at info@aquaclean.com. <br>
                        Visit our website: www.aquaclean.com <br>
                    </span>
                </div>
            </center>

        </div>
    </div>

</body>

</html>
