
<form class="form-horizontal" id="basic" wire:submit.prevent='add'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">محتوى الطلب :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="content" id="content" rows="6" wire:model.lazy='content'
                    placeholder="محتوى الطلب"></textarea>
            </div>
            @error('content') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">المتطلبات :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="special_needs" id="special_needs" rows="6" wire:model.lazy='special_needs'
                    placeholder="المتطلبات"></textarea>
            </div>
            @error('special_needs') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0">ارفع ملف</label>
            </div>
            <div class="col-md-8">
                <div class="input-group file-browser d-flex">
                    <input type="text" name="text" class="form-control bg-transparent border-end-0 browse-file valid w-auto"
                        placeholder="إرفع ملف" readonly="" aria-invalid="false">
                    <label class="input-group-btn mb-0">
                        <span class="btn btn-primary br-ts-0 br-bs-0">إرفع <input type="file" wire:model.lazy='file' name="file"
                                style="display: none;">
                        </span>
                    </label>
                </div>
                @error('file') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary w-auto m-auto d-block" value="إرسال الطلب">
    </div>

</form>
