@if(count($errors)>0 )
<div class="alert alert-dismissible alert-danger">
    @foreach ($errors->all() as $error)
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oh !</strong> {{$error}}<br>
    @endforeach
</div>
@endif


@if(session('success'))
<div class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong>Well done!</strong> {{session('success')}}
      </div>
@endif


@if(session('error'))

<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Oh !</strong>{{session('error')}}
          </div>
@endif
