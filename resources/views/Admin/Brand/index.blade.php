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

@if(session('sucess'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ session('sucess')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

                        <div class="card-header">All Brand</div>
                   

                <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Sr No.</th>
                          <th scope="col">Brand Name</th>
                          <th scope="col">Brand Image</th>
                          <th scope="col">Time</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        
                        @foreach($brands as $brand)
                        
                        <tr>
                          <th scope="row"> {{  $brands->firstItem()+$loop->index }} </th>
                          <td>{{ $brand->brand_name }}</td>
                          <td> <img src="{{ asset($brand->brand_image )}}" style="height:40px; width: 70px;"> </td>

                          <td>
                          @if($brand->created_at ==Null)
                          <span class="text-danger">No Date set</span>
                          @else
                          {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans()  }}
                          @endif

                          </td>
                          <td>
                            <a href="{{ url('brand/edit/'.$brand->id )}}" class="btn btn-info">Edit</a>
                            <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete ')">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                </table>
                {{ $brands->links() }}

                </div>
                    
                </div>

                 <div class="col-md-4">
                    <div class="card">
                        <div class="cart-header">Brand Name</div>
                        <div class="card-body">
                        <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
  <div class="mb-3">
    
    <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    
        @error('brand_name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
  </div>

  <div class="mb-3">
    
    <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1" aria-describedby="emailHelp">
    
        @error('brand_image')
        <span class="text-danger">{{ $message}}</span>
        @enderror
  </div>

  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>
</div>

                         </div>
                    
                </div>

            </div>
            
        </div>


    </div>
</x-app-layout>
