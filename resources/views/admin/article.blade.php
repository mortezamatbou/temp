@extends('admin.layout.panel')

@section('title', $title)

@section("menu")
    @parent
@endsection

@section('body')

    <h2 class="mt-4 mb-3">Articles {{ $article->title }} #{{ $article->id }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <table class="table col-12">
        <tr>
            <td>User</td>
            <td>{{ $article->user->email }}</td>
        </tr>
        <tr>
            <td>Create date</td>
            <td>{{ $article->created_at }}</td>
        </tr>
        <tr>
            <td>Updated date</td>
            <td>{{ $article->updated_at }}</td>
        </tr>
    </table>
    <form action="{{ route('admin.articles.update', ['article' => $article->id]) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status_id">
                <option value="1">Active</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" value="{{ old('title', $article->title) }}" name="title">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea rows="6" class="form-control" name="body">{{ old('body', $article->body) }}</textarea>
        </div>
        <div class="form-group">
            <td>Slug</td>
            <td>
                <input class="form-control" type="text" value="{{ old('slug', $article->slug) }}" name="slug">
            </td>
        </div>
        <div class="form-group text-right">
            <td colspan="2">
                <button class="btn btn-sm btn-success" type="submit">Update</button>
            </td>
        </div>
    </form>

@endsection
