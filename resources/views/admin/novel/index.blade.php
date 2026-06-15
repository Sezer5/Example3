    @extends('layouts.adminlayout')
    @section('title')
        Novels
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Novels</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card p-3">
                            <div class="text-end">
                                <a id="" class="btn btn-success" href="{{ route('admin.novel.create') }}"
                                    role="button"><i class="bi bi-plus"></i> Add Novel</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>*</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Keywords</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($novels as $rs)
                                    <tr>
                                        <td>{{ $rs->id }}</td>
                                        <td>{{ $rs->title }}</td>
                                        <td><img src="{{ asset($rs->thumbnail) }}" width="50"></td>
                                        <td>
                                            @foreach ($rs->keywords as $keyword)
                                                <span class="badge bg-success">{{ $keyword->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.novel.edit', $rs->id) }}" class="btn btn-warning"><i
                                                    class="bi bi-pencil text-white"></i></a>
                                        </td>
                                        <td>
                                            <a onclick="deleteItem({{ $rs->id }})" class="btn btn-danger"><i
                                                    class="bi bi-trash"></i></a>
                                            <form id="{{ $rs->id }}"
                                                action="{{ route('admin.novel.destroy', $rs->id) }}" method="post">
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
