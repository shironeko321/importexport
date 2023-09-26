<x-dashboard-layout users>
  <div class="container-fluid">
    <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}"
      style="width: 300px;">
      @method('put')
      @csrf
      <h1 class="mb-3">Edit User</h1>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name"
          value="{{ $user->name }}">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email"
          value="{{ $user->email }}">
      </div>
      <button type="submit" class="btn btn-primary w-100">Edit</button>
    </form>
  </div>
</x-dashboard-layout>
