<x-dashboard-layout supplier>
  <div class="container-fluid">
    <form method="POST" action="{{ route('supplier.update', ['id' => $supplier->id]) }}"
      style="width: 300px;">
      @method('put')
      @csrf
      <h1 class="mb-3">Edit Supplier</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" value="{{ $supplier->name }}" name="name" class="form-control"
          id="name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" value="{{ $supplier->email }}" name="email" class="form-control"
          id="email">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" value="{{ $supplier->phone }}" name="phone" class="form-control"
          id="phone">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" value="{{ $supplier->address }}" name="address" class="form-control"
          id="address">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $supplier->description }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Edit</button>
    </form>
  </div>
</x-dashboard-layout>
