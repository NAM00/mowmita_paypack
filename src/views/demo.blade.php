<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generate Token</title>
</head>
<body>
<div align="center">
    <div>
        <div>
            <h2>Payment</h2>
        </div>

        <div>
            <form method="post" action="{{ route('pay') }}">
                <fieldset>

                    <input type="text" name="customer_name" placeholder="Customer Name" size="50" required/> <br> <br>

                    <input type="text" name="customer_phone" placeholder="Customer Phone" size="50" required/> <br> <br>

                    <input type="text" name="email"  placeholder="Customer Email" size="50" required/> <br> <br>
                    <input type="text" name="customer_address" placeholder="Customer Address" size="50" required/> <br> <br>

                    <input type="text" name="customer_city" placeholder="Customer City" size="50"/> <br> <br>

                    <input type="text" name="customer_state" placeholder="Customer State" size="50"/> <br> <br>
                    <input type="text" name="customer_postcode" placeholder="Customer Postcode" size="50"/> <br> <br>

                    <input type="text" name="customer_country" placeholder="Customer Country" size="50" required/> <br> <br>

                    <input type="text" name="amount" placeholder="Amount" size="50" required/> <br> <br>
                    <input type="text" name="order_id" placeholder="Invoice no" size="50" required/> <br> <br>


                    <br>
                    <br>
                    <input type="radio" name="currency" value="USD"/> USD <br>
                    <input type="radio" name="currency" value="BDT" checked/> BDT <br>
                    <br> <br>


                    <div>
                        <button type="submit"  name="submit" style="color: white;background-color: darkgreen">
                            Pay
                        </button>
                    </div>

                </fieldset>
            </form>

        </div>

    </div>
</div>


</body>
<!-- end: BODY -->
</html>
