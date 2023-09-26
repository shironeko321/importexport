<x-dashboard-layout product>
  <div class="container-fluid">
    <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}"
      style="width: 300px;">
      @method('put')
      @csrf
      <h1 class="mb-3">Edit Product</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name"
          value="{{ $product->name }}" autofocus>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" class="form-control" id="price"
          value="{{ $product->price }}">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" min="0" class="form-control" id="stock"
          value="{{ $product->stock }}">
      </div>
      <div class="mb-3">
        <label for="supplier" class="form-label">Supplier</label>
        <select name="supplier" class="form-select" id="supplier">
          @foreach ($supplier as $item)
            <option value="{{ $item->id }}" @selected($product->supplier_id === $item->id)>{{ $item->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Edit</button>
    </form>
  </div>
</x-dashboard-layout>
