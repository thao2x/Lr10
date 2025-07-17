@include('backend.dashboard.component.breadcrumb', 
        ['title' => $config['seo']['create']['title']], 
        ['table' => $config['seo']['create']['tableHeading']])

<form action="" method="" class="box">
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
                                    <input
                                        type="text"
                                        name="email"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Họ tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
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
                                    <select name="user_catalogue_id" id="" class="select-box">
                                        <option value="0">Chọn nhóm thành viên</option>
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">xxxx</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ngày sinh
                                    </label>
                                    <input
                                        type="text"
                                        name="birthday"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="password"
                                        name="password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Nhập lại mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="password"
                                        name="re_password"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ảnh đại diện
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="image"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
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
                                    <select name="province_id" id="" class="select-box">
                                        <option value="0">Chọn Thành phố</option>
                                        @php $provinces = $location['province']; @endphp
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->code }}">{{ $province->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row d-flex form-select">
                                    <label for="" class="control-label text-right">
                                        Quận/Huyện
                                    </label>
                                    <select name="district_id" id="" class="select-box">
                                        <option value="0">Chọn Quận/Huyện</option>
                                        @php $districts = $location['district']; @endphp
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->code }}">{{ $district->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row d-flex form-select">
                                    <label for="" class="control-label text-right">
                                        Phường/Xã
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="ward_id" id="" class="select-box">
                                        <option value="0">Chọn Phường/Xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Địa chỉ
                                    </label>
                                    <input
                                        type="text"
                                        name="address"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Số điện thoại
                                    </label>
                                    <input
                                        type="text"
                                        name="phone"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ghi chú
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        value=""
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    />
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