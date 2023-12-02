@extends('admins.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم اعضاء الهيئة التدريسية</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">اعضاء الهيئة التدريسية</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">جميع اعضاء الهيئة التدريسية</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة عضو جديد</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>اسم عضو هيئة التدريس</th>
                                <th>الكلية</th>
                                <th>رقم الهاتف</th>
                                <th>إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professors as $prof)
                            <tr id="tr_{{$prof->id}}">
                                <td>
                                                @if ($prof->image != null)
                                                    <img src="{{asset('assets/images/data/professors/'.$prof->id.'/'.$prof->image)}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                @else
                                                    @if($prof->gender == 'ذكر')
                                                    <img src="{{asset('assets/images/data/professors/male.jpg')}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                    @else
                                                    <img src="{{asset('assets/images/data/professors/female.jpg')}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                    @endif
                                                @endif

                                </td>
                                
                                <td>
                                    {{$prof->name}}
                                </td>
                                <td>                          
                                    <span class="user-1 ms-2"> {{$prof->college->name}}</span>
                                </td>
                                <td>{{$prof->phone}}</td>
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="تعديل"
                                        href="{{ route('admin.professor.edit',['id'=>$prof->id]) }}"><i
                                            class="fe fe-edit-2 fs-16"></i></a>
                                     @if ($prof->college->professors->count() > 1 && $prof->students->count()==0)
                                    <form action="{{  route('admin.professor.delete',['id'=>$prof->id])  }}" method="post" class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="حذف" type="submit"><i class="fe fe-trash fs-16"></i></button>
                                    </form>
                                    @endif 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane userprof-tab" id="tab2">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class=" m-b-20">
                                <div class="card-header">
                                    <h3 class="card-title">إضافة عضو جديد</h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.professor.add')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

