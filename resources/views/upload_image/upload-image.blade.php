<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload Multiple Images</h2>

       {{-- back button --}}
        <div class="d-flex justify-content-end">
            <a href=" {{ route('welcome') }} " class="btn btn-secondary">Back</a>
        </div>


        {{-- success message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action=" {{ route('images.store') }} " method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="images" class="form-label">Choose Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>


        {{-- Display uploaded images --}}
        @if ($images->count() > 0)
            <h3 class="mt-5">Uploaded Images:</h3>
            <div class="row mt-3">
                @foreach ($images as $image)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $image->file_path) }}" alt="Image" class="img-thumbnail"
                            style="width: 150px; height: 150px;">
                    </div>
                @endforeach
            </div>
        @else
            <p>No images uploaded yet.</p>
        @endif


    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
