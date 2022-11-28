<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Transaksi</h4>
		<h6><a target="_blank" href=""></a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Total Harga</th>
				<th>Tanggal Pembelian</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $p)
			<tr>
                <th scope="row">{{ $loop->iteration }}</th>
				<td>{{$p->user->name}}</td>
				<td>{{$p->total_harga}}</td>
				<td>{{$p->created_at->format('d-m-Y')}}</td>
				<td>{{$p->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>