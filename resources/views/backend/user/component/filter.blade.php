<form action="{{route('user.index')}}">
    <div class="filter">
        <div class="perpage">
            <div class="d-flex align-items-center justify-content-between mb-2 h-34">
                <select name="perpage" class="form-control perpage filter w15">
                    @for ($i = 20; $i <= 200; $i+=20)
                        <option value="{{ $i }}" {{ request('perpage') == $i ? 'selected' : '' }}>{{ $i }} bản ghi</option>
                    @endfor
                </select>
                <div class="action w70-10 d-flex align-items-center h-100">
                    <select name="user_catalogue_id" class="form-control w30 mr-1">
                        <option value="0" selected="selected">Chọn Nhóm Thành Viên</option>
                        <option value="1" {{ request('user_catalogue_id') == 1 ? 'selected' : '' }}>Quản trị viên</option>
                        <option value="2" {{ request('user_catalogue_id') == 2 ? 'selected' : '' }}>Cộng tác viên</option>
                    </select>
                    <div class="input-group d-flex align-items-center justify-content-between w70-10 h-100">
                        <input 
                            type="text" 
                            name="keyword" 
                            value="{{ request('keyword') }}" 
                            placeholder="Nhập từ khóa bạn muốn tìm kiếm..."
                            class="form-control w50">
                        <button type="submit" name="search" value="search"
                            class="btn btn-primary mb-0 btn-sm w25-10 h-100">Tìm Kiếm</button>
                        <a href="{{route('user.create')}}" class="btn btn-danger mb-0 btn-sm w25-10 h-100"><i class="fa fa-plus"></i>Thêm mới thành viên</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
