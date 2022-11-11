<x-layout>
    <x-slot name="title">
        <title>All blogs</title>
    </x-slot>
    <x-slot name="content">
    @foreach ($blogs as $blog)

    <h1>
       <a href="blogs/{{$blog->slug}}"> {{$blog->title}} </a>
     </h1>
  <div>
    <p>  published at-  {{$blog->created_at->diffForHumans()}} </p>
     <p>   {{$blog->intro}}   </p>
  </div>

 @endforeach
    </x-slot>
</x-layout>
