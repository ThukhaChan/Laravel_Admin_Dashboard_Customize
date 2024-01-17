@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5 shadow">
                    <div class="card-body m-3">
                        <div class="">
                            <h1>item</h1>
                            <form method="POST" action="{{ route('item.update', $item->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')is-invalid @enderror"
                                        value="{{ old('name', $item->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Category<small class="text-danger">*</small></label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == old('category_id')) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price"
                                        class="form-control @error('price')is-invalid @enderror"
                                        value="{{ old('price', $item->price) }}">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Expired Date</label>
                                    <input type="text" name="expired_date"
                                        class="form-control @error('expired_date')is-invalid @enderror"
                                        value="{{ old('expired_date', $item->expired_date) }}">
                                    @error('expired_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                        <div class="mb-4">
                            <a href="{{ route('item.index') }}" class="btn btn-outline-dark">Back</a>
                            <button class="btn btn-outline-primary">Update</button>
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
