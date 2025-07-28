@include('backend.dashboard.component.breadcrumb', [
    'title' => $config['seo'][$config['method']]['title'],
    'table' => $config['seo'][$config['method']]['tableHeading']
])
<form action="{{ route('user.destroy', $user->id) }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Bạn đang muốn xóa thành viên:</div>
                    <div class="panel-description">Lưu ý: Không thể khôi phục thành viên sau khi xóa</div>
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
                                    </label>
                                    <input type="text" 
                                        name="email" 
                                        value="{{ $user->email }}"
                                        class="form-control" 
                                        placeholder="" 
                                        autocomplete="off" 
                                        readonly/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Họ tên
                                    </label>
                                    <input type="text" 
                                        name="name" 
                                        value="{{ $user->name }}"
                                        class="form-control" 
                                        placeholder="" 
                                        autocomplete="off" 
                                        readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="text-right">
            <button class="btn btn-danger mb-3" type="submit" name="send" value="send">Xóa thành viên</button>
        </div>
    </div>
</form>
