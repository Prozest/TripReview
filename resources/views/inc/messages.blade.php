<link rel="stylesheet" href="{{asset('css/app.css')}}">
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert">
            <div class="alert-text-negative">{{$error}}</div>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert">
        <div class="alert-text-positive">{{session('success')}}</div>
    </div>
@endif

@if (session('error'))
    <div class="alert">
        <div class="alert-text-negative">{{session('error')}}</div>
    </div>
@endif
