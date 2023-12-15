@extends('admins.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">معرض الصور</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">معرض الصور</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
           <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">معرض الصور </a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة  صورة</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galaries as $c)
                            <tr id="tr_{{$c->id}}">
                                <td>
                                                @if ($c->image != null)
                                                    <img src="{{asset('assets/images/data/galaries/'.$c->id.'/'.$c->image)}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                @endif
                                </td>
                               
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="تعديل"
                                        href="{{ route('admin.galary.edit',['id'=>$c->id]) }}"><i
                                            class="fe fe-edit-2 fs-16"></i></a>
                                    @if($galaries->count()>4)
                                    <form action="{{  route('admin.galary.delete',['id'=>$c->id])  }}" method="post" class="d-inline-block">
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
                                    <h3 class="card-title">إضافة صورة </h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.galary.add')
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

