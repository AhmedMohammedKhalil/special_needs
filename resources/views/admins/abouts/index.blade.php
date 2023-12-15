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
           
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> العنوان</th>
                                <th>المحتوى</th>
                                <th>إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $c)
                            <tr id="tr_{{$c->id}}">
                                <td>
                                                @if ($c->image != null)
                                                    <img src="{{asset('assets/images/data/aboutus/'.$c->image)}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                @endif
                                </td>
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
                                        href="{{ route('admin.about.edit',['id'=>$c->id]) }}"><i
                                            class="fe fe-edit-2 fs-16"></i></a>
                                    
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="عرض"
                                        href="{{ route('admin.about.show',['id'=>$c->id]) }}"><i
                                            class="fe fe-eye fs-16"></i></a>

                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection

