
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h4>Billing Info</h4>
        <table border="1">
            <tr>
                <th>Customer Name</th>
                <td>{{ $customer->first_name.' '.$customer->lest_name }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $customer->phone_number }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $customer->address }}</td>
            </tr>
        </table>
        <h4>Shipping Info</h4>
        <table border="1">
            <tr>
                <th>Customer Name</th>
                <td>{{ $shipping->full_name }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $shipping->phone_number }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $shipping->address }}</td>
            </tr>
        </table>
        <h3>Product Info</h3>
        <table border="1">
            <thead class="bg-primary">
            <tr>
                <th class="text-center">Sl No</th>
                <th class="text-center">Product id</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Product Price</th>
                <th class="text-center">Product Quantity</th>
                <th class="text-center">Total Price</th>
            </tr>
            </thead>
            @php($i=1)
            @foreach($orderDetails as $orderDetail)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-center">{{ $orderDetail->product_id }}</td>
                    <td class="text-center">{{ $orderDetail->product_name }}</td>
                    <td class="text-center">TK.{{ $orderDetail->product_price }}</td>
                    <td class="text-center">{{ $orderDetail->product_quantity }}</td>
                    <td class="text-center">TK.{{ $orderDetail->product_price*$orderDetail->product_quantity }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
