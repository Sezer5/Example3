    @extends('layouts.adminlayout')
    @section('title')
        Novels
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Novel Add</h2>

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

                <div class="card p-4 col-md-6">
                    <form action="{{ route('admin.novel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="title"
                                id="title" aria-describedby="helpId" placeholder="Please enter the title"
                                value="{{ old('name') }}" />
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                name="thumbnail" id="thumbnail" placeholder="Please enter thumbnail"
                                aria-describedby="fileHelpId" />
                            @error('thumbnail')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keywords</label>
                            <select multiple class="form-select form-select-lg" name="keyword_id[]" id="keyword_id">
                                <option selected disabled>Select keywords for a novel</option>
                                @foreach ($keywords as $keyword)
                                    <option value="{{ $keyword->id }}" @if (collect(old('keyword_id[]'))->contains($keyword->id))  @endif>
                                        {{ $keyword->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" rows="3">{{ old('desc') }}</textarea>
                        </div>
                        <div class="mb-3 text-end">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
