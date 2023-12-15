<form class="form-horizontal" id="basic" wire:submit.prevent='edit'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">العنوان :</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="title" wire:model.lazy='title' class="form-control form-text">
                @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>



    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">تفاصيل :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="content" id="" rows="6" wire:model.lazy='content'
                    placeholder="تفاصيل"></textarea>
            </div>
            @error('content') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0">فيديو :</label>
            </div>
            <div class="col-md-8">
                <div class="input-group file-browser">
                <input type="file" wire:model='video' id="video" class="form-control" placeholder="">
                @error('video') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="أضافة">
    </div>

</form>
