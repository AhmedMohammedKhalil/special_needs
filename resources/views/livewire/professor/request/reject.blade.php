
<form class="form-horizontal" id="basic" wire:submit.prevent='edit'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">سبب الرفض :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="review" id="review" rows="6" wire:model.lazy='review'
                    placeholder="سبب الرفض"></textarea>
            </div>
            @error('review') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>


    <div class="form-group w-auto m-auto">
        <input type="submit" class="btn btn-primary w-auto m-auto d-block" value="رفض الطلب">
    </div>

</form>
