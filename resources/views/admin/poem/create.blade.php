    @extends('layouts.adminlayout')
    @section('title')
        Poems
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Poem Add</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card p-3">
                            <div class="text-end">
                                <a id="" class="btn btn-success" href="{{ route('admin.poem.create') }}"
                                    role="button"><i class="bi bi-plus"></i> Add poem</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-4 col-md-6">
                    <form action="{{ route('admin.poem.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" aria-describedby="helpId" placeholder="Please enter the title"
                                value="{{ old('title') }}" />
                            @error('title')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                name="thumbnail" id="thumbnail" placeholder="Please choose the thumbnail"
                                value="{{ old('thumbnail') }}" />
                        </div>
                        @error('thumbnail')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="mb-3">
                            <label for="" class="form-label">Keywords</label>
                            <select multiple class="form-select form-select-sm" name="keyword_id[]" id="">
                                <option selected disabled>Select keywords</option>
                                @foreach ($keywords as $rs)
                                    <option value="{{ $rs->id }}" @selected(in_array($rs->id, old('keyword_id', [])))>{{ $rs->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>



                        <button type="submit" class="btn btn-success inline-block">
                            Submit
                        </button>
                    </form>


                </div>
            </div>
        </main>
    @endsection
