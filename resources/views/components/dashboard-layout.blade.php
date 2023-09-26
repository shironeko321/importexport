@extends('layout.index', ['title' => 'Dashboard', 'theme' => 'dark'])

@section('main')
  <div class="vh-100 d-flex flex-column">
    <nav class="navbar bg-dark border-bottom border-body">
      <div class="container-fluid justify-content-start">
        <a class="navbar-brand" href="/">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navigation" aria-controls="navigation" aria-expanded="true"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="dropdown ms-auto">
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ $user->name }}
          </button>
          <ul class="dropdown-menu mt-2" style="left: -20%">
            <li><a class="dropdown-item" href="{{ route('dashboard.logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="d-flex mt-2">
      <div class="collapse show collapse-horizontal bg-body-tertiary" id="navigation">
        <div class="nav flex-column nav-pills">
          <a @class(['nav-link rounded-0', 'active' => $dashboard])>Dashboard</a>
          <a href="{{ route('users.index') }}" @class(['nav-link rounded-0', 'active' => $users])>Users</a>
          <a href="{{ route('supplier.index') }}" @class(['nav-link rounded-0', 'active' => $supplier])>Supplier</a>
          <a href="{{ route('product.index') }}" @class(['nav-link rounded-0', 'active' => $product])>Product</a>
          <a @class(['nav-link rounded-0', 'active' => $transaction])>Transaction</a>
          <a href="{{ route('admin.index') }}" @class(['nav-link rounded-0', 'active' => $admin])>Admin</a>
        </div>
      </div>

      {{ $slot }}
    </div>
  </div>
@endsection
