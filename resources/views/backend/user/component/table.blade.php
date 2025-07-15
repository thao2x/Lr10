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
        @if (@isset($users))
            @foreach ($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->phone}}
                    </td>
                    <td>
                        {{$user->address}}
                    </td>
                    <td class="text-center">
                        <input type="checkbox" class="js-switch item_switch_{{$user->id}}" checked>
                    </td>
                    <td class="text-center">
                        <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}