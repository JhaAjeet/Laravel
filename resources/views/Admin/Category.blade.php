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

                <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Sr No.</th>
                          <th scope="col">User_Id</th>
                          <th scope="col">Category</th>
                          <th scope="col">Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <th scope="row"></th>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        
                      </tbody>
                </table>
            </div>
            
        </div>

    </div>
</x-app-layout>
