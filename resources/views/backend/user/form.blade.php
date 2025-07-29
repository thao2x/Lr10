@include('backend.dashboard.component.breadcrumb', [
    'title' => $config['seo'][$config['method']]['title'],
    'table' => $config['seo'][$config['method']]['tableHeading']
])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Nhập thông tin chung của người sử dụng</div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="email" value="{{ old('email', $user->email ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Họ tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row d-flex form-select">
                                    <label for="" class="control-label text-right">
                                        Nhóm thành viên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="user_catalogue_id" id="" class="select-box setupSelect2">
                                        <option value="0">Chọn nhóm thành viên</option>
                                        <option value="1"
                                            {{ old('user_catalogue_id', $user->user_catalogue_id ?? '') == 1 ? 'selected' : '' }}>
                                            Quản trị viên</option>
                                        <option value="2"
                                            {{ old('user_catalogue_id', $user->user_catalogue_id ?? '') == 2 ? 'selected' : '' }}>
                                            Cộng tác viên</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ngày sinh
                                    </label>
                                    <input type="date" name="birthday"
                                        value="{{ old('birthday', $user->birthday ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        @if ($config['method'] == 'create')
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">
                                            Mật khẩu
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="password" name="password" value="" class="form-control"
                                            placeholder="" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">
                                            Nhập lại mật khẩu
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="password" name="re_password" value="" class="form-control"
                                            placeholder="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ảnh đại diện
                                    </label>
                                    <input type="text" name="image" value="{{ old('image', $user->image ?? '') }}"
                                        class="form-control input-image" placeholder="" autocomplete="off"
                                        data-upload="Images" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ của người sử dụng</div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row d-flex form-select">
                                    <label for="" class="control-label text-right">
                                        Thành phố
                                    </label>
                                    <select name="province_id" id="province-select" class="select-box setupSelect2">
                                        <option value="0">Chọn Thành phố</option>
                                        @php $provinces = $location['province']; @endphp
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->code }}"
                                                {{ old('province_id', $user->province_id ?? '') == $province->code ? 'selected' : '' }}>
                                                {{ $province->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row d-flex form-select">
                                    <label for="" class="control-label text-right">
                                        Quận/Huyện
                                    </label>
                                    <select name="district_id" id="district-select" class="select-box setupSelect2">
                                        <option value="0">Chọn Quận/Huyện</option>
                                        @if (isset($user->province->districts))
                                            @foreach ($user->province->districts as $district)
                                                <option value="{{ $district->code }}"
                                                    {{ old('district_id', $user->district_id ?? '') == $district->code ? 'selected' : '' }}>
                                                    {{ $district->full_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row d-flex form-select">
                                    <label for="" class="control-label text-right">
                                        Phường/Xã
                                    </label>
                                    <select name="ward_id" id="ward-select" class="select-box setupSelect2">
                                        <option value="0">Chọn Phường/Xã</option>
                                        @if (isset($user->district->wards))
                                            @foreach ($user->district->wards as $ward)
                                                <option value="{{ $ward->code }}"
                                                    {{ old('ward_id', $user->ward_id ?? '') == $ward->code ? 'selected' : '' }}>
                                                    {{ $ward->full_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Địa chỉ
                                    </label>
                                    <input type="text" name="address"
                                        value="{{ old('address', $user->address ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Số điện thoại
                                    </label>
                                    <input type="text" name="phone"
                                        value="{{ old('phone', $user->phone ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ghi chú
                                    </label>
                                    <input type="text" name="description"
                                        value="{{ old('description', $user->description ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary mb-3" type="submit" name="send" value="send">Lưu</button>
        </div>
    </div>
</form>
