<x-layout>
      
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3"> {{$blog->title}} </h3>
          <div>
            <h4> Author - <a href="/users/{{$blog->author->username}} ">{{$blog->author->name}}</a> </h4>
            <div class="badge bg-primary"> <a href="/categories/{{$blog->category->slug}}"><span>  {{$blog->category->name}}  </span></a>  </div>
            <div class="text-secondary"  ><span> {{$blog->created_at->format("F j, Y, g:i a")}}</span></div>
          </div>
          <p class="lh-md mt-3">
           {{$blog->body}}
          </p>
        </div>
      </div>
    </div>
    <section class="container">
        <div class="col-md-8 mx-auto">
          @auth
               <x-comment-form :blog="$blog" />
          @else
          <p class="text-center">please <a href="/login">login</a> to participate in this discussion.</p>
          @endauth
            
        </div>
    </section>
  
    
    @if($blog->comments->count())
    <x-comments :comments="$blog->comments" />
    @endif
   
    <x-subscribe/>
    <x-blogs_you_may_like  :randomBlogs='$randomBlogs'  />
 
 
</x-layout>
