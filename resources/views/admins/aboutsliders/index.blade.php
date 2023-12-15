@extends('admins.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم من نحن</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">من نحن</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                 <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">قيمنا </a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة  قيمة</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                 
                                <th> العنوان</th>
                                <th>المحتوى</th>
                                <th>إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aboutsliders as $c)
                            <tr id="tr_{{$c->id}}">
                             
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark">
                                                    <h4 class="font-weight-bold">{{$c->title}}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                

                                <td style="text-wrap: wrap;">
                                    <div class="media mt-0 mb-0">
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark">
                                                    <h4 class="font-weight-bold">{{$c->content}}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="تعديل"
                                        href="{{ route('admin.aboutslider.edit',['id'=>$c->id]) }}"><i
                                            class="fe fe-edit-2 fs-16"></i></a>
                                    
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="عرض"
                                        href="{{ route('admin.aboutslider.show',['id'=>$c->id]) }}"><i
                                            class="fe fe-eye fs-16"></i></a>
                                    
                                    <form action="{{  route('admin.aboutslider.delete',['id'=>$c->id])  }}" method="post" class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="حذف" type="submit"><i class="fe fe-trash fs-16"></i></button>
                                    </form>
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
                                    <h3 class="card-title">إضافة قيمة </h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.aboutslider.add')
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

