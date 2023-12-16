@extends('admin.layout.panel')

@section('title', $title)

@section("menu")
    @parent
@endsection

@section('body')

    <h2 class="mt-4 mb-3">Add new Article</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" value="{{ old('title', '') }}" name="title">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea rows="6" class="form-control" name="body">{{ old('body', '') }}</textarea>
        </div>
        <div class="form-group">
            <td>Slug</td>
            <td>
                <input class="form-control" type="text" value="{{ old('slug', '') }}" name="slug">
            </td>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status_id">
                @foreach($status_list as $row)
                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <td colspan="2" class="text-right">
                <button class="btn btn-sm btn-success" type="submit">Submit</button>
            </td>
        </div>
    </form>

@endsection
