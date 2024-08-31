<?php

namespace App\Http\Controllers\Classrooms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Toastr;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $classes = Classroom::all();
    $Grades = Grade::all();
    return view('classrooms.classes',compact('classes','Grades'));
  }



  public function store(StoreClassRequest $request)
  {

    try{
       DB::beginTransaction();

      $validated = $request->validated();
      $list_classes = $request->List_Classes;

      foreach($list_classes as $list_classe){
        $classes = new Classroom();
        $classes->Name = ['ar' => $list_classe['Name'],'en' => $list_classe['Name_en']];
        $classes->Grade_id = $list_classe['Grade_id'];
        $classes->save();

      }
      DB::commit();
      Toastr::success(trans('messages.added_successfully!'));
      return redirect()->back();

    }
    catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  public function update(StoreClassRequest $request)
  {
    try{
      DB::beginTransaction(); // Begin a new database transaction

      $validated = $request->validated();
      $classroom = Classroom::findOrFail($request->id);

      // Check if Grade_id exists in the grades table
      if (!Grade::find($request->Grade_id)) {
          throw new \Exception(trans('messages.grade_not_found'));
      }

      $classroom->update([
          'Name' => ['en' => $request->Name_en, 'ar' => $request->Name],
          'Grade_id' => $request->Grade_id,
      ]);

      DB::commit();
      Toastr::success(trans('messages.updated_successfully!'));
      return redirect()->back();
    }
      catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


  }

  public function destroy(StoreClassRequest $request)
  {
    Classroom::destroy($request->id);
    Toastr::success(trans('messages.deleted_successfully!'));
    return redirect()->back();

  }
  public function delete_all(StoreClassRequest $request)
  {
    $ids = explode(',', $request->ids); // Ensure ids is an array
    Classroom::destroy($ids);

    Toastr::success(trans('messages.deleted_successfully!'));
    return redirect()->back();
  }
  public function filter_by_grade(Request $request){
   $classes = Classroom::where('Grade_id',$request->Grade_id)->get();
   $Grades = Grade::all();
   return view('classrooms.classes',compact('classes','Grades'));

  }
  }

