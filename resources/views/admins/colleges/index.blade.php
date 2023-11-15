@extends('admins.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم الكليات</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">الكليات</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">جميع الكليات</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة كلية جديد</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الكلية</th>
                                <th>المكان</th>
                                <th>إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colleges as $c)
                            <tr id="tr_{{$c->id}}">
                                <td>
                                                @if ($c->image != null)
                                                    <img src="{{asset('assets/images/data/colleges/'.$c->id.'/'.$c->image)}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                @else
                                                    <img src="{{asset('assets/images/data/colleges/college.JPG')}}" alt="img" class="w-7 h-7 br-7 me-3">                      
                                                @endif
                                </td>
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark">
                                                    <h4 class="font-weight-bold">{{$c->name}}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark">
                                                    <h4 class="font-weight-bold">{{$c->location}}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="تعديل"
                                        href="{{ route('admin.college.edit',['id'=>$c->id]) }}"><i
                                            class="fe fe-edit-2 fs-16"></i></a>
                                    
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="عرض"
                                        href="{{ route('admin.college.show',['id'=>$c->id]) }}"><i
                                            class="fe fe-eye fs-16"></i></a>

                                    @if ($c->professors->count()==0 && $c->requests->count()==0 )
                                    <form action="{{  route('admin.college.delete',['id'=>$c->id])  }}" method="post" class="d-inline-block">
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
                                    <h3 class="card-title">إضافة كلية جديد</h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.college.add')
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

