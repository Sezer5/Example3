<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddNovelRequest;
use App\Http\Requests\UpdateNovelRequest;
use App\Models\Keyword;
use App\Models\Novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.novel.index')->with([
            'novels' => Novel::with(['keywords'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.novel.create')->with([
            'keywords' => Keyword::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNovelRequest $request)
    {
        if ($request->validated()) {
            $data = $request->validated();
            if ($request->has('thumbnail')) {
                $data['thumbnail'] = $this->saveImage($request->file('thumbnail'));
            }
            $novel = Novel::create($data);
            $novel->keywords()->sync($request->keyword_id);
            return redirect()->route('admin.novel.index')->with([
                'success' => 'Novel created successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Novel $novel)
    {
        return view('admin.novel.edit')->with([
            'keywords' => Keyword::all(),
            'novel' => $novel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNovelRequest $request, Novel $novel)
    {
        if ($request->validated()) {
            $data = $request->validated();
            if ($request->has('thumbnail')) {
                $this->deleteImage($novel->thumbnail);
                $data['thumbnail'] = $this->saveImage($request->thumbnail);
                $novel->update($data);
                $novel->keywords()->sync($request->keyword_id);
                return redirect()->route('admin.novel.index')->with([
                    'success' => 'Novel updated successfully'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel)
    {
        $this->deleteImage($novel->thumbnail);
        $novel->delete();
        return redirect()->route('admin.novel.index')->with([
            'success' => 'Novel deleted successfully'
        ]);
    }

    public function saveImage($file)
    {
        $file_name = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('images/novels', $file_name, 'public');
        return 'storage/images/novels/' . $file_name;
    }

    public function deleteImage($file)
    {
        $image_path = public_path($file);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }
}
