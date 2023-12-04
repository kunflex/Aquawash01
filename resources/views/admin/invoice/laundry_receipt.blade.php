<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/receipt.css')}}">
</head>
<body>
<div class="receipt-container">
    <center>
        <div class="receipt-header">
                <h2> ABC LAUNDRY SERVICES</h2>
                <span>456 Oak Street Cityville, USA 54321</span><br>
                <span>Phone: (555) 987-6543</span><br>
                <span>Email:  info@abclaundry.com</span><br>
            <hr>
        </div>
    </center>

    <div class="receipt-body">
        <div class="receipt-top">
            <strong>Receipt Number:</strong> <span id="laundry_receipt"></span><br>
            <span><strong>Date:</strong> November 27, 2023</span>
        </div>

        <div class="customer-details">
            <hr>

            <h3>Customer Information:</h3>
            <span>Name: Jane Smith</span><br>
            <span>Address: 789 Pine Lane</span><br>
            <span>Phone: (555) 234-5678</span><br>
            <span>Email: janesmith@email.com</span><br>

            <hr>
        </div>

        <div class="invoice-details">
                <h3>Service Details:</h3>

            <div>
                1. Laundry Service: <br>
                <div class="summation">
                    <div class="left">- Wash & Fold: 10 lbs @ $1.50/lb </div>
                    <div class="right">  $15.00 </div>
                </div>
                2. Additional Services: <br>
                <div class="summation">
                    <div class="left">- Stain Removal  </div>
                    <div class="right"> $5.00 </div>
                </div>
                <div class="summation">
                    <div class="left">- Express Service (24 hours)  </div>
                    <div class="right">  $10.00  </div>
                </div>
            </div>

            <hr>

            <div class="summation">
                <div class="left">Subtotal: </div>
                <div class="right"> $30.00 </div>
            </div>

            <div class="summation">
                <div class="left">Tax(8%): </div>
                <div class="right"> $2.40 </div>
            </div>

            <div class="summation">
                <div class="left"><strong>Total Amount: </strong></div>
                <div class="right"><strong>$32.40 </strong></div>
            </div>

                                     

            <hr>
        </div>

        <div class="payment-info">
            <h3>Payment Information:</h3>

            <span>
                Payment Method: MasterCard **** 5678 <br>
                Cardholder Name: Jane Smith <br>
                Expiry Date: 09/24 <br>
            </span>

            
        </div>

        
        <center>
            <div class="receipt-footer">
                <hr>
                    <span>
                        <strong>Thank you for choosing ABC Laundry Services!</strong> <br>
                        We appreciate your business.

                        For inquiries, please contact us at (555) 987-6543
                        or email us at  info@abclaundry.com. <br>

                        Visit our website: www.abclaundry.com <br>
                    </span>
            </div>
        </center>

    </div>
    

</div>

</body>
</html>
<script>
           var currentNumber = 100000;

            function generateRandomNumber() {
            var randomNumber = Math.floor(Math.random() * 900000) + 100000;

            // Make sure the random number is always greater than the current number.
            while (randomNumber <= currentNumber) {
                randomNumber = Math.floor(Math.random() * 900000) + 100000;
            }

            currentNumber = randomNumber;

            return randomNumber;
            }

            document.getElementById("laundry_receipt").innerText = "LS" + generateRandomNumber().toString();
    </script>
