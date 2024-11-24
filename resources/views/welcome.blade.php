</html>

<!DOCTYPE html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
    @layer utilities{
        .container{
            @apply px-10 mx-auto;
        }
        .btn{
            bg-green-600 text-white rounded py-2 px-4
        }
    }
    </style>
</head>
<body>
    Homepage</br>
    <a href="/create">Add New Post</a></br>
    @if(session('success'))
       <h2> {{session('success')}}</h2>
       @endif
       <div class="">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Id</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                      </tr>
                     </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$post->id}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->description}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="images/{{$post->image}}" width="80px" alt=""> </td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <a href="{{route('edit',$post->id)}}" class="btn">Edit</a>
                                <a href="{{route('delete',$post->id)}}" class="btn">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                        

                    </tbody>
                  </table>
                  {{ $posts->links() }}
                </div>
              </div>
            </div>
          </div>
       </div>
</body>
</html>