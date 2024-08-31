<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $sections=Section::findOrFail(4);
        // return $sections->teachers;

    //   $teachers = Teacher::findOrFail(1);

    //   return $teachers->Sections;

        $Grades = Grade::with('Sections')->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('Sections.sections',compact('Grades','list_Grades','teachers'));
    }


    public function getClasses($id){
        $data = Classroom::where('Grade_id',$id)->pluck('Name','id');
        return $data;
    }


    public function store(StoreSectionRequest $request)
    {
        try{
           DB::beginTransaction();
           $validated = $request->validated();
           $sections = new Section();
           $sections->Name = ['en' => $request['Name_Section_En'],'ar' => $request['Name_Section_Ar']];
           $sections->Grade_id = $request->Grade_id;
           $sections->Class_id = $request->Class_id;
           $sections->Status=1;
           $sections->save();
           $sections->teachers()->attach($request->teacher_id);


           DB::commit();
           Toastr::success(trans('messages.added_successfully!'));
           return redirect()->back();

         }
         catch (\Exception $e) {
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }




    public function update(StoreSectionRequest $request)
    {
        try{
            DB::beginTransaction();
            $validated = $request->validated();
            $sections = Section::findOrFail($request->id);
            $sections->Name = ['en'=>$request['Name_Section_En'],'ar' =>$request['Name_Section_Ar']];
            $sections->Grade_id = $request->Grade_id;
            $sections->Class_id= $request->Class_id;
            if(isset($request->Status)){
                $sections->Status = 1;
            }

            else{
                $sections->Status = 2;
            }

                 // update pivot tABLE
        if (isset($request->teacher_id)) {
            $sections->teachers()->sync($request->teacher_id);
        } else {
            $sections->teachers()->sync(array());
        }

            $sections->save();
            DB::commit();
            Toastr::success(trans('messages.updated_successfully!'));
            return redirect()->back();

          }
          catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }

    }


    public function destroy(Request $request)
    {
       Section::destroy($request->id);
       Toastr::success(trans('messages.deleted_successfully!'));
       return redirect()->back();

    }
}
