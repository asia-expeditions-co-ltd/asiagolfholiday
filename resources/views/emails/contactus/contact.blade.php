<!DOCTYPE html>
<html>
<head>
	<title>{{config('name')}}</title>
	<!-- Latest compiled and minified CSS -->
</head>
<body style="background: #f5f8fa;">
	<div style="padding: 22px;width: 859px;border: solid #ddd 1px;margin: auto;">
		<div>
			<center>
				<img src="{{url('')}}/img/demo-logo.png">
			</center>
		</div>
		<div class="container">
			<h2>Contact Name: {{$data['fullname']}}</h2>
			<h2>Contact Phone: {{$data['phone']}}</h2>			
			<h2>Email Address: {{$data['email']}}</h2>
			<h2>Message: {{$data['message']}}</h2>
		</div>
	</div>
</body>
</html>