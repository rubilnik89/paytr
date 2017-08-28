<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>craft</title>
</head>
<body class="craft-body">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/lightbox.css">
<link rel="stylesheet" href="css/style.css">

    <div>
    @foreach($links as $link)
        <a href="{{ route('my_orders_pdf', $link['document_id']) }}">{{ $link['link']['DocumentLink']['URL'] }}</a><hr>
        @endforeach
    </div>
</body>
</html>