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

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
                            </th>
<<<<<<< HEAD
                            <th style="width: 20%">Avarta</th>
=======
                            <th>Avarta</th>
>>>>>>> 91037d29506f6dced6d6a5c73a5695397a43f39b
                            <th>Thông tin thành viên</th>
                            <th>Địa chỉ</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                            </td>
                            <td>
<<<<<<< HEAD
                                <span class="image img-cover"><img src="https://bizweb.dktcdn.net/100/303/962/files/87126502-2509242206005371-2073523065622364160-n-f697e400-e8b2-4bb1-9698-d00b50b2d9c3.jpg?v=1627804121650" alt=""></span>
                            </td>
                            <td>
                                <div class="info-item name">
                                    <strong>Họ tên:</strong>
                                </div>
                                <div class="info-item name">
                                    <strong>Email:</strong>
                                </div>
                                <div class="info-item name">
                                    <strong>Phone:</strong>
                                </div>
                            </td>
                            <td>
                                <div class="address-item name">
                                    <strong>Địa chỉ:</strong>
                                </div>
                                <div class="address-item name">
                                    <strong>Phường:</strong>
                                </div>
                                <div class="address-item name">
                                    <strong>Quận:</strong>
                                </div>
                                <div class="address-item name">
                                    <strong>Thành phố:</strong>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch" checked="" data-switchery="true" style="display: none;">
                            </td>
=======
                                <span class="image"><img src="https://bizweb.dktcdn.net/100/303/962/files/87126502-2509242206005371-2073523065622364160-n-f697e400-e8b2-4bb1-9698-d00b50b2d9c3.jpg?v=1627804121650" alt=""></span>
                            </td>
                            <td>
                                <div class="info-item name">Họ tên:</div>
                                <div class="info-item name">Email:</div>
                                <div class="info-item name">Phone:</div>
                            </td>
                            <td>
                                <div class="address-item name">Địa chỉ:</div>
                                <div class="address-item name">Phường:</div>
                                <div class="address-item name">Quận:</div>
                                <div class="address-item name">Thành phố:</div>
                            </td>
                            <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
>>>>>>> 91037d29506f6dced6d6a5c73a5695397a43f39b
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
