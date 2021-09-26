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

                        <div class="card-header">All Category</div>
                   

                <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Sr No.</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">user</th>
                          <th scope="col">Time</th>
                        </tr>
                      </thead>
                      <tbody>

                        
                        @foreach($categories as $category)
                        
                        <tr>
                          <th scope="row"> {{  $categories->firstItem()+$loop->index }} </th>
                          <td>{{ $category->categories_name }}</td>
                          <td>{{ $category->user->name  }}</td>

                          <td>
                          @if($category->created_at ==Null)
                          <span class="text-danger">No Date set</span>
                          @else
                          {{ Carbon\Carbon::parse($category->created_at)->diffForHumans()  }}
                          @endif

                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                </table>
                {{ $categories->links() }}

                </div>
                    
                </div>

                 <div class="col-md-4">
                    <div class="card">
                        <div class="cart-header">Category Name</div>
                        <div class="card-body">
                        <form action="{{route('store.categories')}}" method="POST">
                            @csrf
  <div class="mb-3">
    
    <input type="text" class="form-control" name="categories_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    
        @error('categories_name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
  </div>
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>

                         </div>
                    
                </div>

            </div>
            
        </div>

    </div>
</x-app-layout>
