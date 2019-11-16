<!DOCTYPE html>
<html>
<head>
	<title>Hóa đơn</title>
</head>
<body>
<h1>Cảm ơn bạn đã mua hàng tại KNStore</h1>
<ul>
@foreach($bill_details as $product)
<li>{{ $product->qty }}x {{ $product->name }}</li>
@endforeach
</ul>
<h2>Tổng tiền :{{ $total }}</h2>
</body>
</html>