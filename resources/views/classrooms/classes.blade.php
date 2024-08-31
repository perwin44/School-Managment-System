@extends('layouts.master')
@section('css')
    @toastr_css
    <style>
            .hidden {
                display: none;
            }
            .a_link{
                background-color: blue;
                color: white;
                border: 1px white;
                border-radius: 5px;
                padding: 10px 18px 10px 17px;
                font-size: 15px;
            }
    </style>
@section('title')
    {{ trans('classes_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('classes_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('classes_trans.add_class') }}
            </button>
            <button  type="button" id="delete_all" class="button x-small" data-toggle="modal" data-target="#deleteAllModal">
                    {{ trans('classes_trans.delete_all') }}
            </button>
            <br><br>
            <div class="form-group">

                        <div class="box">
                            <select id="gradeSelected" class="form-control form-control-lg" style="width:200px;" name="Grade_id">
                               <option value="" disabled selected>{{  trans('classes_trans.Search_Name_Grade')  }}</option>
                                @foreach ($Grades as $Grade)
                                 <option value="{{ $Grade->id  }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                </div>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="id" id="checkbox_all_id"></th>
                            <th>{{ trans('classes_trans.Name_class') }}</th>
                            <th>{{ trans('classes_trans.Name_Grade') }}</th>
                            <th>{{ trans('classes_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($classes as $class)
                            <tr>
                                <?php $i++; ?>
                                <td><input style="margin-left:12px;" type="checkbox" name="id" class="checkbox_class" value="{{ $class->id}}"> {{$i}}</td>
                                <td>{{ $class->Name }}</td>
                                <td>{{ $class->Grades->Name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $class->id }}"
                                        title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $class->id }}"
                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('classes_trans.edit_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('Classrooms.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                            class="mr-sm-2">{{ trans('classes_trans.class_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                            class="form-control"
                                                            value="{{ $class->getTranslation('Name', 'ar')}}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $class->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">{{ trans('classes_trans.class_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $class->getTranslation('Name', 'en')}}"
                                                            name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('classes_trans.Name_Grade') }}
                                                        :</label>
                                                        <div class="box">
                                                            <select class="form-control form-control-lg" style="padding-bottom:3px;" name="Grade_id">

                                                              <option value="{{$class->Grade_id}}">{{$class->Grades->Name}}</option>
                                                                @foreach ($Grades as $Grade)
                                                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('classes_trans.delete_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Classrooms.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $class->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<!-- delete all-->
<div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">
               {{ trans('classes_trans.delete_all') }}
           </h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <div class="modal-body">
           <form id="deleteForm" action="{{ route('delete_all') }}" method="POST">
               @csrf
               @method('DELETE')
               {{ trans('Grades_trans.Warning_Grade') }}
               <input id="ids" type="hidden" name="ids" class="form-control">
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">
                       {{ trans('Grades_trans.Close') }}
                   </button>
                   <button type="submit" class="btn btn-danger">
                       {{ trans('Grades_trans.submit') }}
                   </button>
               </div>
           </form>
       </div>
   </div>
 </div>
</div>
<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classes_trans.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
                    @csrf

                    <div class="card-body"> 
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>

                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('classes_trans.class_name_ar') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name" required />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('classes_trans.class_name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name_en" required />
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('classes_trans.Name_Grade') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="Grade_id">
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('classes_trans.Processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('classes_trans.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classes_trans.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>
</div>

</div>

<!-- row closed -->
@endsection
@section('js')

<script>

  $(document).ready(function() {
            document.getElementById('gradeSelected').addEventListener('change', function() {
            var gradeId = this.value;
            window.location.href = `{{ route('filter_by_grade') }}?Grade_id=${gradeId}`;
             });

            $('.checkbox_class').change(function() {

            });

            $('#checkbox_all_id').change(function() {
                var isChecked = $(this).prop('checked');
                $('.checkbox_class').prop('checked', isChecked);

            });

            $('#delete_all').click(function() {
                var checkedValues = $('.checkbox_class:checked').map(function() {
                    return $(this).val();
                }).get();

                if (checkedValues.length > 0) {
                    $('#ids').val(checkedValues.join(','));

                } else {
                    // Handle case where no checkboxes are checked
                    alert('Please select at least one item to delete.');
                }
            });
});
</script>
@toastr_js
@toastr_render
@endsection
