@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-primary mb-4">Chỉnh sửa sản phẩm</h2>
    <div class="card shadow p-4">
        <form action="{{ route('products.update', $product['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" value="{{ $product['name'] }}" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control">{{ $product['description'] }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" name="price" value="{{ $product['price'] }}" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" name="quantity" value="{{ $product['quantity'] }}" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
        </form>
    </div>
</div>
@endsection