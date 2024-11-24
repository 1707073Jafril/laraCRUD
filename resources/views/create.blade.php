<!DOCTYPE html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500 text-xl">Create</h2>
            <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Home</a>
        </div>
    <div>

    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-5">
            <label for="">Name</label>
            <input type="text" name="name" value="{{old('name')}}">
            @error('name')
                <p>{{$message}}</p>         
            @enderror
            <label for="">Description</label>
            <input type="text" name="description" value="{{old('description')}}"">
            @error('description')
            <p>{{$message}}</p>         
            @enderror
            <label for="">Image</label>
            <input type="file" name="image" id="">
            <div>
                <input type="submit" class="bg-green-500" text-white py-2 px-4 rounded inline-block>
            </div>
        </div>
    </form>
    </div>
    </div>
    

</body>
</html>