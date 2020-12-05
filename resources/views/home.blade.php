@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SovTech Blog</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(Session::has('blog'))
                    <div class="alert alert-success">
                       <p>{{ Session::get('blog') }}</p>
                    </div>
                    @endif

                    @if(Session::has('blog_delete'))
                    <div class="alert alert-success">
                       <p>{{ Session::get('blog_delete') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('store.blog') }}" method="POST">
                        @csrf
                  <div class="form-group">
                      <label for="title">Title:</label>
                      <input type="text" class="form-control" v-model="form.title"  name="title"
                          placeholder="Enter Blog Title" value="{{ old('title') }}">
                       <div class="alert-danger">{{ $errors->first('title') }}</div>
                    </div>

                    <div class="form-group">
                      <label for="description">Description:</label>
                      <textarea cols="10" rows="5" class="form-control" id="description" v-model="form.description" name="description"
                            placeholder="Enter Blog Description" >
                          {{ old('description') }}
                      </textarea>
                      <div class="alert-danger">{{ $errors->first('description') }}</div>
                    </div>


                  <div>
                      <input type="submit" class="btn btn-primary" value="ADD BLOG">
                      </form>
                  </div>

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="card">
                @if(count($blogs)>0)



                    <table class="table table-striped">

                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($blogs as $blog )
                        <tr>

                            <td>{{$blog->title}}</td>
                            <td>{{$blog->blog_description}}</td>
                            <td>
                                <a href="/edit-blog/{{$blog->id}}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="/BlogDelete/{{$blog->id}}"  class="btn btn-danger">Delete</a>
                            </td>


                        </tr>
                        @endforeach
                  </table>
                  <div>
                    {{ $blogs->links() }}
                  </div>


                  @else
                  <h3>You do not have Any Blog Post</h3>

                @endif


            </div>



        </div>
    </div>
</div>
@endsection
