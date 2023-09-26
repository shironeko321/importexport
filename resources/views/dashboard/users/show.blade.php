<x-dashboard-layout users>
  <div class="container-fluid">
    <div style="width: 300px;">
      @csrf
      <h1 class="mb-3">Detail User</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name"
          value="{{ $user->name }}" disabled>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email"
          value="{{ $user->email }}" disabled>
      </div>
      <a href="{{ route('users.edit', ['id' => $user->id]) }}"
        class="btn btn-primary w-100">Edit</a>
    </div>
  </div>
</x-dashboard-layout>
