    @extends('layouts.adminlayout')
    @section('title')
        Keywords
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Keyword Add</h2>

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

                <div class="card p-4 col-md-6">
                    <form action="{{ route('admin.keyword.update', $keyword->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id=""
                                aria-describedby="helpId" placeholder="Enter a name"
                                value="{{ old('name', $keyword->name) }}" />
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success inline-block">
                            Submit
                        </button>
                    </form>


                </div>
            </div>
        </main>
    @endsection
