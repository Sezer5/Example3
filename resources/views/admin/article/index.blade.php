    @extends('layouts.adminlayout')
    @section('title')
        Articles
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Articles</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card p-3">
                            <div class="text-end">
                                <a id="" class="btn btn-success" href="{{ route('admin.article.create') }}"
                                    role="button"><i class="bi bi-plus"></i> Add Article</a>

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
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $rs)
                                    <tr class="">
                                        <td>{{ $rs->id }}</td>
                                        <td><img src="{{asset( $rs->thumbnail )}}" width="50"></td>
                                        <td>{{ $rs->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.article.edit', $rs->id) }}" class="btn btn-warning"><i
                                                    class="bi bi-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" onclick="deleteItem({{ $rs->id }})"
                                                class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <form id="{{ $rs->id }}"
                                                action="{{ route('admin.article.destroy', $rs->id) }}" method="POST">
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
