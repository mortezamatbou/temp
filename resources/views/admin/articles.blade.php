@extends('admin.layout.panel')

@section('title', $title)

@section("menu")
    @parent
@endsection

@section('body')

    <h2 class="mt-4 mb-3">Articles
        @can('create articles')
            <a class="btn btn-warning" href="{{ route('admin.articles.create') }}">Add New Article</a>
        @endcan
    </h2>

    <form id="article-form" action="{{ route('admin.articles.index') }}" method="get">
        <div class="row mb-3">
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
                        <option value="" {{ !$status_id ? 'selected' : '' }}>all</option>
                        @foreach($status_list as $row)
                            <option
                                value="{{ $row->id }}" {{ $status_id == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 text-right">
                <input type="submit" class="btn btn-success" value="filter">
            </div>
        </div>
    </form>
    <table class="table col-12 mt-4 table-responsive">
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


<script>
    window.onload = function () {
        $("#article-form").submit(function (e) {
            e.preventDefault();

            const title = $('input[name=title]').val();
            const slug = $('input[name=slug]').val();
            const status_id = $('select[name=status_id]').find(':selected').val();

            let searchable = [];

            if (title) {
                searchable.push('title:' + title);
            }

            if (slug) {
                searchable.push('slug:' + slug);
            }

            if (status_id) {
                searchable.push('status_id:' + status_id);
            }


            // search=title=Test;slug=php;status_id=1

            if (searchable) {
                window.location = "{{ route('admin.articles.index') }}" + "?search=" + searchable.join(';');
            }

        });
    }
</script>
