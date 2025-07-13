<div class="row wrapper border-bottom white-bg">
    <div class="collg-8">
        <h2>{{ config('apps.user.title') }}</h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>{{ config('apps.user.title') }}</strong>
            </li>
        </ol>

    </div>
</div>

<div class="row mx-2 mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.user.tableHeading')}}</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="filter">
                    <div class="perpage">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <select name="perpage" class="form-control input-sm perpage filter mr10">
                                @for($i = 20; $i <= 200; $i++)
                                    <option value="{{ $i }}">{{ $i }} bản ghi</option>
                                @endfor
                            </select>
                            <div class="action">
                                <div class="uk-flex uk-flex-middle">
                                    <select name="user_catalogue_id" class="form-control mr10">
                                        <option value="0" selected="selected">Chọn Nhóm Thành Viên</option>
                                        <option value="1">Quản trị viên</option>
                                    </select>
                                    <div class="uk-search uk-flex uk-flex-middle mr10">
                                        <div class="input-group">
                                            <input type="text" name="keyword" value="" placeholder="Nhập từ khóa bạn muốn tìm kiếm..." class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm">Tìm Kiếm</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
                            </th>
                            <th style="width: 20%">Họ tên</th>
                            <th>Email:</th>
                            <th>Số điện thoại:</th>
                            <th>Địa chỉ:</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thao tác:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                            </td>
                            <td>
                                Nguyen Thanh Thao
                            </td>
                            <td>
                                tt@gmail.com
                            </td>
                            <td>
                                0899310465
                            </td>
                            <td>
                                Dien Ban, Da Nang
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="js-switch" checked="" data-switchery="true" style="display: none;">
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });
    })
</script>
