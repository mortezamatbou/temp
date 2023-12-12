@extends('admin.layout.panel')

@section('title', $title)

@section("menu")
    @parent
@endsection

@section('body')

    <h2 class="mt-4 mb-3">Articles</h2>

    <table class="table col-12">
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
                <td>{{ $article['id'] }}</td>
                <td>{{ $article['title'] }}</td>
                <td>{{ $article['slug'] }}</td>
                <td>{{ $article['user_email'] }}</td>
                <td>{{ $article['created_at'] }}</td>
                <td>{{ $article['updated_at'] }}</td>
                <td>{{ $article['status_title'] }}</td>
                <td><a class="btn btn-sm btn-primary" href="{{ route('admin.articles.show', ['article' => $article['id']]) }}">Show || Edit</a></td>
            </tr>
        @endforeach
    </table>

@endsection

<?php
/**
 * <td>{{ $article->id }}</td>
 * <td>{{ $article->title }}</td>
 * <td>{{ $article->slug }}</td>
 * <td>{{ $article->user_email }}</td>
 * <td>{{ $article->created_at }}</td>
 * <td>{{ $article->updated_at }}</td>
 * <td>{{ $article->status_title }}</td>
 * <td><a href=""><i class="bi bi-6-square"></i></a></td>
     */
?>
