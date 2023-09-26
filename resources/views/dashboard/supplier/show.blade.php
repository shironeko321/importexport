<x-dashboard-layout supplier>
  <div class="container-fluid">
    <div style="width: 300px;">
      @csrf
      <h1 class="mb-3">Detail Supplier</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" value="{{ $supplier->name }}" name="name" class="form-control"
          id="name" disabled>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" value="{{ $supplier->email }}" name="email" class="form-control"
          id="email" disabled>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" value="{{ $supplier->phone }}" name="phone" class="form-control"
          id="phone" disabled>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" value="{{ $supplier->address }}" name="address" class="form-control"
          id="address" disabled>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10"
          disabled>{{ $supplier->description }}</textarea>
      </div>
      <a href="{{ route('supplier.edit', ['id' => $supplier->id]) }}"
        class="btn btn-primary w-100">Edit</a>
    </div>
  </div>
</x-dashboard-layout>
