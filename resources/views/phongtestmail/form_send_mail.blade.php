<form action="{{route('HandlingCredit')}}" method="Post" enctype="multipart/form-data">
	@csrf
	<p>nhập tên:
		<input type="text" name="name">
	</p>
	<p>nhập multi file:
		<input type="number" name="amount" multiple>
		<!-- <input type="hidden" name="type" value="paypal"> -->
		<input type="hidden" name="type" value="wallet">
	</p>
	<input type="submit" name="submit">
</form>