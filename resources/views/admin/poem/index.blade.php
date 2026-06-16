    @extends('layouts.adminlayout')
    @section('title')
        Poems
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Poems</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card p-3">
                            <div class="text-end">
                                <a id="" class="btn btn-success" href="{{ route('admin.poem.create') }}"
                                    role="button"><i class="bi bi-plus"></i> Add Poem</a>
                            </div>
                            <div class="table-responsive-sm mt-3">
                                <table class="table table-bordered rounded">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Keywords</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($poems as $poem)
                                            <tr>
                                                <td>{{ $poem->id }}</td>
                                                <td>{{ $poem->title }}</td>
                                                <td>
                                                    @foreach ($poem->keywords as $keyword)
                                                        <span class="badge bg-success">{{ $keyword->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td><img src="{{ asset($poem->thumbnail) }}" width="50"></td>
                                                <td>
                                                    <a href="{{ route('admin.poem.edit', $poem->id) }}"
                                                        class="btn btn-sm btn-warning"><i class="bi bi-wrench"></i></a>
                                                </td>
                                                <td>
                                                    <a href="#" onclick="deleteItem({{ $poem->id }})"
                                                        class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                    <form id="{{ $poem->id }}"
                                                        action="{{ route('admin.poem.destroy', $poem->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card p-4">

                </div>
            </div>
        </main>
    @endsection
