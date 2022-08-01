@extends('Dashboard.master')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div>
		
		<div class="col-sm-4 cat-form">
			@if(Session::has('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ Session('message') }}
			</div>
			@endif
			<h3>Website Settings</h3>
			<form method="post" action="{{url('addsettings')}}" >
				{{ csrf_field() }}
				<input type="hidden" name="tbl" value="{{encrypt('settings')}}">
				<div class="form-group">
					<label>Logo</label>
					<input type="file" name="image"  class="form-control"> 
				</div>

                <div class="form-group">
				<label>About Us</label>
				<textarea name="about" class="form-control"></textarea>
			</div>

				<div class="form-group">
					<label>Social</label>
					<input type="url" name="url" id="slug" class="form-control" >
					<p class="text-muted">e.g. https://www.facebook.com</p>
				</div>
			
				<div class="form-group">
					<button class="btn btn-primary">Add Settings</button>
				</div>
			</form>	


		</div>
</div>
@stop