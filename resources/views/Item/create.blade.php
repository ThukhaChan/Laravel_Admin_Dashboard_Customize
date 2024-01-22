@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
               <div class="card mt-5 shadow">
                <div class="card-body m-3">
                    <div class="">
                        <h1 class="bg-gradient text-center">Item</h1>
                        @if (session('success'))
                          <div class=" alert alert-success">
                          {{ session('success') }}
                          </div>
                        @endif
                        <form method="POST" action="{{ route('item.store') }}"enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Name<small class="text-danger">*</small></label>
                                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                 <div class="text-danger">
                                    *{{ $message }}
                                 </div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Category<small class="text-danger">*</small></label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if($category->id == old('category_id')) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Price<small class="text-danger">*</small></label>
                                <input type="price" name="price" class="form-control @error('price')is-invalid @enderror" value="{{ old('price') }}">
                                @error('price')
                                 <div class="text-danger">
                                    *{{ $message }}
                                 </div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Expired Date<small class="text-danger">*</small></label>
                                <input type="date" name="expired_date" class="form-control @error('expired_date')is-invalid @enderror" value="{{ old('expired_date') }}">
                                @error('expired_date')
                                 <div class="text-danger">
                                    *{{ $message }}
                                 </div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Choose Image<small class="text-danger">*</small></label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                @error('image')
                                 <div class="text-danger">
                                    *{{ $message }}
                                 </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <a href="{{ route('item.index') }}" class="btn btn-outline-dark">Back</a>
                                <button class="btn btn-outline-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                 </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection