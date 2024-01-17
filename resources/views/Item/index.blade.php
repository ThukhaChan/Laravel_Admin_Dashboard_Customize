@extends('dashboard.index')
@section('content')
<div class="container mt-4">
  <style>
    .custom-table th, .custom-tbody td {
      text-align: center;
    }
    
    .custom-table th {
      background-color: #687265; 
      color: #fff;
    } 

    .custom-tbody tbody{
      background-color: #700f0f;
    }

    .custom-tbody tbody tr:nth-child(even) {
      background-color: #f2f2f2; /* Light gray for even rows */
    }

    .custom-tbody tbody tr:hover {
      background-color: #cce5ff; /* Light blue on hover */
    }
  </style>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
              <div class="mb-3">
                @if (session('edit'))
                 <div class=" alert alert-warning">
                  {{ session('edit') }}
                 </div>
               @endif
               @if (session('update'))
                 <div class=" alert alert-success">
                   {{ session('update') }}
                 </div>
               @endif
               @if (session('delete'))
                  <div class=" alert alert-danger">
                     {{ session('delete') }}
                  </div>
               @endif
              </div>
            </div>
                <table class="table table-striped">
                    <thead class="custom-table">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Expired Date</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>

                  <!--  read data from database  --> 

                    <tbody class="custom-tbody">
                      @foreach ($items as $item )
                      <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->expired_date }}</td>
                        <td>
                            <!-- font awesome & bootstrip icon -->
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('item.edit',$item->id) }}" class="btn btn-outline-warning me-1">
                                  <i class="fas fa-edit"></i>
                                </a>
                                {{-- <a href="{{ route('item.show',$item->id) }}" class="btn btn-outline-info me-1">
                                  <i class="fas fa-info"></i>
                                </a> --}}
                                <form method="POST" action="{{ route('item.destroy',$item->id) }}" class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                   <button href="" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                                     <i class="fas fa-trash"></i>
                                   </button>
                                </form>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection