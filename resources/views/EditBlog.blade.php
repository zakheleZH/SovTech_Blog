@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    UPDATE POST

                </div>

                <div class="card-body">





                      <form action="{{ route('update.blog') }}" method="POST">
                          @csrf

                       <input type="hidden" name="id" value="{{ $blog->id }}">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title  }}"
                            placeholder=" Enter Blog Title">
                            <div class="alert-danger">{{ $errors->first('title') }}</div>
                      </div>

                      <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea  class="form-control" id="description" v-model="form.description" name="description"
                            required  placeholder="Enter Blog Description">{{ $blog->blog_description  }}
                        </textarea>
                        <div class="alert-danger">{{ $errors->first('description') }}</div>
                      </div>


                    <div>
                        <input type="submit" class="btn btn-primary" value="UPDATE BLOG">
                        </form>
                    </div>







                </div>

            </div>






        </div>




    </div>

</div>
@endsection
