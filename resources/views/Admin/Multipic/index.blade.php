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
                    <div class="card-group">
                        @foreach($images as $multi)
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <img src="{{ asset($multi->image) }}">
                            </div>
                        </div>
                        @endforeach

  
                </div>
                    
                </div>

                 <div class="col-md-4">
                    <div class="card">
                        <div class="cart-header"> Multi Image</div>
                        <div class="card-body">
                        <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
    

  <div class="mb-3">
    
    <input type="file" class="form-control" name="image[]" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="" >
    
        @error('image')
        <span class="text-danger">{{ $message}}</span>
        @enderror
  </div>

  <button type="submit" class="btn btn-primary">Add Image</button>
</form>
</div>

                         </div>
                    
                </div>

            </div>
            
        </div>


    </div>
</x-app-layout>
