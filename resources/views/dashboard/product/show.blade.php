<x-dashboard-layout product>
  <div class="container-fluid">
    <div style="width: 300px;">
      @csrf
      <h1 class="mb-3">Detail Product</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input disabled type="text" name="name" class="form-control" id="name"
          value="{{ $product->name }}" autofocus>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input disabled type="text" name="price" class="form-control" id="price"
          value="{{ $product->price }}">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input disabled type="number" name="stock" min="0" class="form-control"
          id="stock" value="{{ $product->stock }}">
      </div>
      <div class="mb-3">
        <label for="supplier" class="form-label">Supplier</label>
        <select disabled name="supplier" class="form-select" id="supplier">
          <option value="{{ $product->supplier->id }}">{{ $product->supplier->name }}</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea disabled name="description" class="form-control" id="description" cols="30"
          rows="10">{{ $product->description }}</textarea>
      </div>
      <a href="{{ route('product.edit', ['id' => $product->id]) }}"
        class="btn btn-primary w-100">Edit</a>
    </div>
  </div>
</x-dashboard-layout>
