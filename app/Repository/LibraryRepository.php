<?php


namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Library;
use App\Models\Section;

class LibraryRepository implements LibraryRepositoryInterface
{

    use AttachFilesTrait;

    public function index()
    {
        $books= Library::all();
        return view('cms.book.index' , compact('books'));
    }

    public function show($id)
    {
        $section = Section::findOrFail($id);
        return view('cms.book.create' , compact('section'));
    }

    public function store($request)
    {
        try{
            $book = new Library();
            $book->title = ['en' => $request->title_en , 'ar'  => $request->title];
            $book->file_name =  $request->file('file_name')->getClientOriginalName();
            $book->grade_id = $request->grade_id;
            $book->classroom_id = $request->classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();

            $this->uploadFile($request,'file_name','library');

            toastr()->success(trans('messages.Success'));
            return redirect()->route('library.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $book = Library::findOrFail($id);
        return view('cms.book.edit' , compact('book'));
    }

    public function update($request)
    {
        try{
            $book = Library::findOrFail($request->id);
            $book->title = ['en' => $request->title_en , 'ar'  => $request->title];
            if($request->hasfile('file_name')){

                $this->deleteFile($book->file_name , 'library');

                $this->uploadFile($request,'file_name','library');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('library.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $this->deleteFile($request->file_name , 'library');
        Library::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('library.index');
    }

    public function download($filename)
    {
        return response()->download(public_path('attachments/library/'.$filename));
    }
}