@extends('admin.layout.base')

@section('title', $title)

@section("menu")
    @parent
@endsection

@section('body')

    <h2>Login Form</h2>
    <hr>

    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') ?? 'mori@lobdown.com' }}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-sm">
        </div>
    </form>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
