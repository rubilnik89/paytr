<!doctype html>

<body>
{{--<p>gtrghrtg<p/>--}}
{{--{{ $v }}--}}
@foreach ($data as $order)
    <p>ID: {{ $order->id }}</p><br>
    <p>Name: {{ $order->name }}</p><br>
    <p>Amount: {{ $order->amount }}</p><br>
    <p>Delivery days: {{ $order->days }}</p><br>
    <p>Price one: {{ $order->price }}</p><br>
    <p>Price total: {{ $order->total_price }}</p><hr>
    @endforeach
</body>
</html>
