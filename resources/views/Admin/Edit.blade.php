<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->

            <b>{{ Auth::user()->name }}</b>
           

        </h2>
    </x-slot>

    <div class="py-12">
       <!--  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> -->

        <div class="container">
            <div class="row">


                 <div class="col-md-8">
                    <div class="card">
                        <div class="cart-header">Edit category</div>
                        <div class="card-body">
                        <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                            @csrf
  <div class="mb-3">
    
    <input type="text" class="form-control" name="categories_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories->categories_name }}">
    
        @error('categories_name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
  </div>
  <button type="submit" class="btn btn-primary">Update Category</button>
</form>
</div>

                         </div>
                    
                </div>

            </div>
            
        </div>

    </div>
</x-app-layout>
