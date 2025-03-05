@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-primary mb-4">Thêm sản phẩm</h2>
    <div class="card shadow p-4">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" placeholder="Nhập tên sản phẩm" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" placeholder="Nhập mô tả sản phẩm" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" name="price" placeholder="Nhập giá sản phẩm" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" name="quantity" placeholder="Nhập số lượng" required class="form-control">
            </div>
            <button type="submit" class="btn btn-success w-100">Lưu</button>
        </form>
    </div>
</div>
@endsection				