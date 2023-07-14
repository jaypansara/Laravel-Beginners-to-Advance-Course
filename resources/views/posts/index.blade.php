<!doctype html>
<html lang="en">

<head>
    <title>Posts</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Toaster css link -->
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">


    <style>
        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
    <script src="https://kit.fontawesome.com/a5d3e38d69.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <h3 class="text-center">Posts</h3>
            <a href="{{ route('posts.create')  }}" class="btn btn-primary mb-2">Create</a>
            <div class="table-responsive">
                @if ( count($posts) > 0)
                <table class="table table-primary table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Active</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ Str::limit($post->title, '10', '...') }}</td>
                            <td>{{ Str::limit($post->description, '10','...' )}}</td>
                            <td>{{ $post->is_publish == '1' ? 'Yes' : 'No' }}</td>
                            <td>{{ $post->is_active == '0' ? 'No' : 'Yes' }}</td>
                            <td id="outer">
                                <a href="{{ route('posts.show',$post->id)}}" class="btn btn-info inner"><i class="fa-sharp fa-solid fa-plus fa-beat-fade"></i>View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success inner"><i class="fa-solid fa-pen-to-square fa-beat-fade"></i> Edit</a>
                                <form method="post" class="inner" action="{{ route('posts.destroy', $post->id) }}">
                                    @csrf
                                    @method ('DELETE')
                                    <button href="" class="btn btn-warning"><i class="fa-regular fa-trash-can fa-bounce"></i> Delete</button>
                                </form>
                                @if ($post->trashed())
                                    <a href="{{ route('posts.soft-delete', $post->id) }}" class="btn btn-danger inner"><i class="fa fa-undo" aria-hidden="true"></i> Undo</a> 
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h4 class="text-center text-danger mt-4">No Post Found</h4>
                @endif
                <!-- {{ $posts->render() }} -->
                {{ $posts->links() }}
            </div>


        </div>

    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        $('#form').parsley();
    </script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "60000",
            "extendedTimeOut": "60000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <script>
        @if(Session::has('alert-success'))
        toastr["success"]("{{ Session::get('alert-success') }}");
        @endif


        @if(Session::has('alert-info'))
        toastr["info"]("{{ Session::get('alert-info') }}");
        @endif

        @if(Session::has('alert-danger'))
        toastr["error"]("{{ Session::get('alert-danger') }}");
        @endif

        @if(Session::has('alert-message'))
        toastr["info"]("{{ Session::get('alert-message') }}");
        @endif

    </script>
</body>

</html>
