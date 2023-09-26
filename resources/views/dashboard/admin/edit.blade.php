<x-dashboard-layout admin>
  <div class="container-fluid">
    <form method="POST" action="{{ route('admin.update', ['id' => $admin->id]) }}"
      style="width: 300px;">
      @method('put')
      @csrf
      <h1 class="mb-3">Edit Admin</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name"
          value="{{ $admin->name }}">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email"
          value="{{ $admin->email }}">
      </div>
      <button type="submit" class="btn btn-primary w-100">Edit</button>
    </form>
  </div>
</x-dashboard-layout>
