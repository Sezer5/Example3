    @extends('layouts.adminlayout')
    @section('title')
        Keywords
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Keywords</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card p-3">
                            <div class="text-end">
                                <a id="" class="btn btn-success" href="{{ route('admin.keyword.create') }}"
                                    role="button"><i class="bi bi-plus"></i> Add Keyword</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">*</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keywords as $rs)
                                    <tr class="">
                                        <td>{{ $rs->id }}</td>
                                        <td>{{ $rs->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.keyword.edit', $rs->id) }}" class="btn btn-warning"><i
                                                    class="bi bi-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" onclick="deleteItem({{ $rs->id }})"
                                                class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <form id="{{ $rs->id }}"
                                                action="{{ route('admin.keyword.destroy', $rs->id) }}" method="POST">
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
        </main>
    @endsection
