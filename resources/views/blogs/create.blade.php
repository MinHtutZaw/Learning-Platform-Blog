<x-layout>
 
<h3 class="my-3 text-center">Blog create form</h3>

<div class="col-md-8 mx-auto">
 <x-card-wrapper>
    <form method="POST" 
        action="/admin/blogs/store">
                        @csrf 
                      
                       
                        <div class="mb-3">
                            <label
                                for="title"
                                class="form-label"
                            >Title</label>
                            <input
                                type="text"
                                required
                                name="title"
                                value="{{old('title')}}"
                                class="form-control"
                                id= "title"
                                aria-describedby="emailHelp"
                            >
                            <x-error name='title'/>
                        </div>
                        <div class="mb-3">
                            <label
                                for="slug"
                                class="form-label"
                            >Slug</label>
                            <input
                                type="text"
                                required
                                name="slug"
                                value="{{old('slug')}}"
                                class="form-control"
                                id= "slug"
                               
                            >
                            <x-error name='slug'/>
                        </div>
                        <div class="mb-3">
                            <label
                                for="intro"
                                class="form-label"
                            >Intro</label>
                            <input
                                type="text"
                                required
                                name="intro"
                                value="{{old('intro')}}"
                                class="form-control"
                                id= "intro"
                            >
                            <x-error name='intro'/>
                        </div>
                        
                        <div class="mb-3">
                    <label
                        for="body"
                        class="form-label"
                    >Body</label>
                    <textarea
                        name="body"
                        id="body"
                        cols="30"
                        rows="10"
                        class="form-control"
                    >{{old('body')}}</textarea>
                    <x-error name="body" />
                </div>

                <div>
                    <label
                        for="category"
                        class="form-label"
                    >Category</label>
                    <select
                        name="category_id"
                        id="category"
                        class="form-control"
                    >
                        @foreach ($categories as $category)
                        <option {{$category->id==old('category_id') ? 'selected':'' }}
                            value="{{$category->id}}">{{$category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-start mt-3">
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >Submit</button>
                </div>  
    </form>
 </x-card-wrapper>
</div>

</x-layout>