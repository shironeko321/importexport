<x-dashboard-layout users>
  <div class="container-fluid">
    <form action="{{ route('users.store') }}" method="POST" style="width: 300px;">
      @csrf
      <h1 class="mb-3">Create New User</h1>
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
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email"
          value="{{ old('email') }}">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" id="password">
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
  </div>
</x-dashboard-layout>
