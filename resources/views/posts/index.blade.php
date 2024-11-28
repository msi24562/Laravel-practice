@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($posts->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:10%; text-align:center;">#</th>
                    <th style="width:30%; text-align:center;">Title</th>
                    <th style="width:40%; text-align:center;">Content</th>
                    <th style="width:20%; text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td style="width:10%;  text-align:center;">{{ $post->id }}</td>
                        <td style="width:30%;">{{ $post->title }}</td>
                        <td style="width:40%;">{{ $post->content }}</td>
                        <td>
                            <!--<a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View</a>-->
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts found.</p>
    @endif
</div>
@endsection
