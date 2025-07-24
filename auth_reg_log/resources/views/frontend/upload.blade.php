<h1>Image Upload</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
@endif

@if (session('success'))
    {{ session('success') }}
@endif

<form method="POST" action="{{ route('upload.submit') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" accept="image/*" />
    <button type="submit">Upload</button>
</form>


@forelse ($images as $image)
    <div>
        <img width="150px" height="150px" src="{{ asset('image/' . $image->image) }}" /><br />
        <form method="POST" action="{{ route('image.delete', $image->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div><br />
@empty
    <div>No image found!</div>
@endforelse
