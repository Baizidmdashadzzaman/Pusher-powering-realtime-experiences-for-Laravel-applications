<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create a New Post</h1>

        <!-- Display success message if available -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}" required>
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
        <br>

        <h2>Post data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
