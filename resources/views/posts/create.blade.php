<!doctype html>
<html lang="en">

<head>
    <title>Create</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Parsely Css -->
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="container">
        <div class="col-md-6 mt-5 offset-3">
            <form method="post" action="{{ route('posts.store') }}" id="form">
                @csrf
                <h3 class="text-center">Create Posts</h3>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (Session::has('alert-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>{{ session::get('alert-success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                @else
                @endif

                <div class="mb-3">
                    <label>Email</label>
                    <input name="title" class="form-control" placeholder="title" data-parsley-type="name" type="text" value="{{ old ('title') }}">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea rows="" class="form-control" cols="" name="description" placeholder="description">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Publish</label>
                    <select class="form-control" name="is_publish">
                        <option disable selected value="">Choose Option</option>
                        <option @selected(old('is_publish')==1) value="1">Yes</option>
                        <option @selected(old('is_publish')==0) value="0">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Active</label>
                    <select class="form-control" name="is_active">
                        <option disable selected value="">Choose Option</option>
                        <option @selected(old('is_active')==1) value="1">Yes</option>
                        <option @selected(old('is_active')==0) value="0">No</option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>


            </form>
        </div>

    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#form').parsley();
    </script>
</body>

</html>
