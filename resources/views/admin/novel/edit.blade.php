    @extends('layouts.adminlayout')
    @section('title')
        Novels
    @endsection
    @section('content')
        <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Novel Edit {{ $novel->title }}</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card p-3">
                            <div class="text-end">
                                <a id="" class="btn btn-success" href="{{ route('admin.novel.create') }}"
                                    role="button"><i class="bi bi-plus"></i> Add novel</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-4 col-md-6">
                    <form action="{{ route('admin.novel.update', $novel->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="" aria-describedby="helpId" value="{{ old('title', $novel->title) }}"
                                placeholder="Enter a title" />
                            @error('title')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keyword</label>
                            <select multiple class="form-select form-select-lg" name="keyword_id[]" id="">
                                <option selected disabled>Select keywords</option>
                                @foreach ($keywords as $rs)
                                    <option value="{{ $rs->id }}" @if ($novel->keywords->contains($rs->id)) selected @endif>
                                        {{ $rs->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                name="thumbnail" aria-describedby="helpId" placeholder="" />
                            @error('thumbnail')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" rows="3">{{ $novel->desc }}</textarea>
                            @error('thumbnail')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
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
