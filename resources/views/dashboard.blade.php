@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <body>
                    <!-- Message -->
                    @if(Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                    @endif

                    <!-- Form -->
                    <form method='post' action='/uploadFile' enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <input class="btn btn-secondary" type='file' name='file'>
                        <input class="btn btn-default" type='submit' name='submit' value='Import'>
                    </form>
                </body>
                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h4>You have no posts</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection