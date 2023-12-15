<form class="form-horizontal" id="basic" wire:submit.prevent='add'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
                <label class="form-label mb-0" id="examplenameInputname2">البريد الإلكترونى :</label>
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
                <label class="form-label mb-0" id="examplenameInputname2">رقم الهاتف :</label>
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
                        <label class="form-label mb-0" id="examplenameInputname2">الكلية :</label>
                    </div>
                                    <div class="select-box col-md-8" >
                                        <select class="form-control form-text" name="college_id" wire:model='college_id'>
                                            <option value="0">اختر الكلية</option>
                                            @foreach ($colleges as $col)
                                            <option value="{{ $col->id }}">{{ $col->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department_id')
                                    <span class="text-danger error">{{ $message }}</span>
                                    @enderror
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

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value=" اضافة">
    </div>

</form>
