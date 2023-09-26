<x-dashboard-layout users>
  <div class="container d-flex flex-column gap-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="h3">Users</span>
      <a href="{{ route('users.create') }}" class="btn btn-primary">New</a>
    </div>
    <div class="container-fluid">
      <table id="users" class="table table-striped">
        <thead>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </thead>
        <tbody>
          @foreach ($collection as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="action">
                  <a href="{{ route('users.show', ['id' => $item->id]) }}"
                    class="btn btn-success">Detail</a>
                  <a href="{{ route('users.edit', ['id' => $item->id]) }}"
                    class="btn btn-primary">Edit</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete">
                    Delete
                  </button>

                  <div class="modal fade" id="delete" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteLabel">Alert</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this item?
                          <div class="mt-4 d-flex justify-content-end align-items-center gap-2">
                            <button type="button" class="btn btn-secondary"
                              data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('users.destroy', ['id' => $item->id]) }}"
                              method="post">
                              <button type="button" class="btn btn-danger">Delete</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @push('script')
    @vite(['resources/js/datatable.js'])
  @endpush
</x-dashboard-layout>
