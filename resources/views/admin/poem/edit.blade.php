    @extends('layouts.adminlayout')
    @section('title')
        Poem
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Poem Edit {{ $poem->title }}</h2>

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
                    <form action="{{ route('admin.poem.update', $poem->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title', $poem->title) }}" />
                            @error('title')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                name="thumbnail" id="" placeholder="" aria-describedby="fileHelpId" />
                            @error('thumbnail')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keywords" class="form-label">Keywords</label>
                            <select name="keyword_id[]" id="keywords"
                                class="form-select @error('keyword_id') is-invalid @enderror" multiple
                                style="height: 150px;">
                                @foreach ($keywords as $rs)
                                    <option value="{{ $rs->id }}" @selected(in_array($rs->id, old('keyword_id', [])) || (!old('keyword_id') && $poem->keywords->contains($rs->id)))>
                                        {{ $rs->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('keyword_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted d-block mt-1">Birden fazla seçmek için Ctrl (Mac için Cmd) tuşuna
                                basılı tutun.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>


                    </form>

                </div>
            </div>
        </main>
    @endsection
