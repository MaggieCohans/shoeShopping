<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>
</head>
<body>
    <h1>This is your pdf product</h1>
    <p>Product name: {{$data->product_title}}</p>
    <p>Product details: {{$data->product_detail}}</p>
    <img height="450" width="450" src="/product_img/{{$data->image}}">
    
</body>
</html>