<x-dashboard-layout product>
  <div class="container-fluid">
    <form action="{{ route('product.store') }}" method="POST" style="width: 350px;">
      @csrf
      <h1 class="mb-3">Create New product</h1>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name"
          value="{{ old('name') }}" autofocus>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" class="form-control" id="price"
          value="{{ old('price') }}">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" min="0" class="form-control" id="stock"
          value="{{ old('stock') }}">
      </div>
      <div class="mb-3">
        <label for="supplier" class="form-label">Supplier</label>
        <select name="supplier" class="form-select" id="supplier">
          @foreach ($supplier as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
  </div>
</x-dashboard-layout>
