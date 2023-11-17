<div class="row">
    @if($colleges)
        @foreach ($colleges as $college)
            <div class="col-lg-6 col-md-6 mb-5">
                <div class="wideget-user-desc">
                    <div class="wideget-user-img">
                        @if ($college->image != null)
                        <img src="{{asset('assets/images/data/colleges/'.$college->id.'/'.$college->image)}}"
                            alt="img">
                        @else
                            <img src="{{asset('assets/images/data/colleges/default.jpg')}}" alt="img">
                        @endif
                    </div>
                    <div class="user-wrap">
                        <h3>{{$college->name}}</h3>
                        <h3>{{$college->location}}</h3>
                        <p class="text-default mb-3">{{nl2br($college->description)}}</p>
                    </div>
                    <div class="btn-list">
                        <a href="{{ route('colleges.show',['id'=>$college->id]) }}" class="btn btn-primary btn-md mb-5 mb-lg-0">للمزيد</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

