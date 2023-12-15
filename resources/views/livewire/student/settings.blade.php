<form class="form-horizontal" id="basic" wire:submit.prevent='edit'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الإسم :</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="name" wire:model.lazy='name' class="form-control form-text">
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الإيميل :</label>
            </div>
            <div class="col-md-8">
                <input type="email" name="email" wire:model.lazy='email' class="form-control form-text" style="direction: ltr">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الرقم المدنى :</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="civil_number" wire:model.lazy='civil_number' class="form-control form-text" style="direction: ltr">
                @error('civil_number') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الموبايل :</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="phone" wire:model.lazy='phone' class="form-control form-text" style="direction: ltr">
                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">الجنس :</label>
            </div>
            <div class="col-md-9">
                <div class="form-controls-stacked d-md-flex">
                    <label class="custom-control custom-radio me-4">
                        <input type="radio" class="custom-control-input" wire:model.lazy='gender' name="gender" value="ذكر"
                            checked>
                        <span class="custom-control-label">ذكر</span>
                    </label>
                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" wire:model.lazy='gender' name="gender"
                            value="أنثى">
                        <span class="custom-control-label">أنثى</span>
                    </label>
                </div>
            </div>
            @error('gender') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">نوع الإعاقة :</label>
            </div>
            <div class="select-box col-md-8">
                <select class="form-control form-text" name="disability_type" wire:model='disability_type'>
                    <option value="0">اختر نوع الإعاقة</option>
                    @foreach ($types as $type)
                    <option value="{{ $loop->iteration }}" @if($this->disability_type == $loop->iteration) selected @endif >{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            @error('disability_type')
            <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0">صورتك الشخصية :</label>
            </div>
            <div class="col-md-8">
                <div class="input-group file-browser">
                    <input type="text" name="text" class="form-control bg-transparent border-end-0 browse-file valid"
                        placeholder="إرفع الصورة" readonly="" aria-invalid="false">
                    <label class="input-group-btn">
                        <span class="btn btn-primary br-ts-0 br-bs-0">إرفع <input type="file" wire:model.lazy='image' name="image"
                                style="display: none;">
                        </span>
                    </label>
                </div>
                @error('image') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الحالة المرضية :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="status" id="status" rows="6" wire:model.lazy='status'
                    placeholder="الحالة المرضية"></textarea>
            </div>
            @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">العنوان :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="address" id="address" rows="6" wire:model.lazy='address'
                    placeholder="العنوان"></textarea>
            </div>
            @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">كلمة السر الجديدة
                    :</label>
            </div>
            <div class="col-md-8">
                <input type="password" name="new_password" wire:model.lazy='password' class="form-control form-text" style="direction: ltr">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">أعد كتابة كلمة السر
                    الجديدة :</label>
            </div>
            <div class="col-md-8">
                <input type="password" name="confirm_password" wire:model.lazy='confirm_password' class="form-control form-text" style="direction: ltr">
                @error('confirm_password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>



    <div class="form-group mx-auto w-auto">
        <input type="submit" class="btn btn-primary d-block mx-auto" value="حفظ التغييرات">
    </div>

</form>
