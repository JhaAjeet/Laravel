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

@if(session('sucess'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>{{ session('sucess')}}</strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


        <div class="container">
            <div class="row">


                 <div class="col-md-8">
                    <div class="card">
                        <div class="cart-header">Brand Edit</div>
                        <div class="card-body">
                        <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

    <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
    <div class="mb-3">
    
    <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
    
        @error('brand_name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
  </div>

    <div class="mb-3">
    
    <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
    
        @error('brand_image')
        <span class="text-danger">{{ $message}}</span>
        @enderror
  </div>


  <div class="form-group">
      <img src="{{ asset($brands->brand_image) }}" style="height: 200px; width: 400px;">
  </div>

  <button type="submit" class="btn btn-primary">Update Brand</button>
</form>
</div>

                         </div>
                    
                </div>

            </div>
            
        </div>

    </div>
</x-app-layout>
