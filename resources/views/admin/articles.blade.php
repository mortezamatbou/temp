@extends('admin.layout.panel')

@section('title', $title)

@section("menu")
    @parent
@endsection

@section('body')

    <h2 class="mt-4 mb-3">Articles</h2>

    <form id="article-form" action="{{ route('admin.articles.index') }}" method="get">
        <div class="row mb-3">
            @csrf
            <div class="col-4">
                <div class="form-group">
                    <label>Title</label> &nbsp;
                    <input class="form-control" name="title" value="{{ app('request')->input('title', '') }}">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Slug</label> &nbsp;
                    <input class="form-control" name="slug" value="{{ app('request')->input('slug', '') }}">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>status</label> &nbsp;
                    @php
                        $status_id = app('request')->input('status_id', 0)
                    @endphp
                    <select class="form-control" name="status_id">
                        <option value="0" {{ !$status_id ? 'selected' : '' }}>all</option>
                        <option value="1" {{ $status_id == 1 ? 'selected' : '' }}>active</option>
                        <option value="2" {{ $status_id == 2 ? 'selected' : '' }}>disable</option>
                    </select>
                </div>
            </div>
            <div class="col-12 text-right">
                <input type="submit" class="btn btn-success" value="filter">
            </div>
        </div>
    </form>
    <table class="table col-12 mt-4">
        <tr>
            <td>#</td>
            <td>Title</td>
            <td>Slug</td>
            <td>User</td>
            <td>Create date</td>
            <td>Updated date</td>
            <td>Status</td>
            <td>&nbsp;</td>
        </tr>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->slug }}</td>
                <td>{{ $article->user->email }}</td>
                <td>{{ $article->created_at }}</td>
                <td>{{ $article->updated_at }}</td>
                <td>{{ $article->status->title }}</td>
                <td><a class="btn btn-sm btn-primary"
                       href="{{ route('admin.articles.show', ['article' => $article->id]) }}">Show || Edit</a></td>
            </tr>
        @endforeach
    </table>

@endsection

