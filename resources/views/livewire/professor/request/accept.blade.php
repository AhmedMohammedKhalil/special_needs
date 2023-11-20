
<form class="form-horizontal" id="basic" wire:submit.prevent='add'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2"> اضافة مقابلة :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="content" id="content" rows="6" wire:model.lazy='content'
                    placeholder=" محتوي المقابلة"></textarea>
            </div>
            @error('content') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">التاريخ :</label>
            </div>
            <div class="col-md-8">
                <input type="datetime-local" name="date" wire:model.lazy='date' class="form-control form-text">
                @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <div class="form-group w-auto m-auto">
        <input type="submit" class="btn btn-primary w-auto m-auto d-block" value="اضافة ">
    </div>

</form>
