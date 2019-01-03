
@extends('admin/layout/index')



@section('content')

<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i>用户列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_1_length" class="dataTables_length"><label>显示 <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> 条</label></div><div class="dataTables_filter" id="DataTables_Table_1_filter">
                            <form action="/admin/user" method="get">
                            <label>关键字: <input type="text" aria-controls="DataTables_Table_1"></label>
                            <input type="submit" value="搜索" class="btn btn-info">
                            </form>
                        </div>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                      <tr role="row">
                        <th class="sorting_asc" style="width: 160px;">ID</th>
                        <th class="sorting" style="width: 205px;">用户名</th>
                        <th class="sorting" style="width: 193px;">邮箱</th>
                        <th class="sorting" style="width: 135px;">手机号</th>
                    <th class="sorting" style="width: 102px;">创建时间</th>
                    <th class="sorting" style="width: 102px;">操作</th></tr>
                </tr>
                      
                    </thead>
                             <tbody role="alert" aria-live="polite" aria-relevant="all">
                            @foreach($data as $k=>$v)
                            <tr class="odd">
                                <td class="">{{ $v->id }}</td>
                                <td class="">{{ $v->uname }}</td>
                                <td class="">{{ $v->user_info->email }}</td>
                                <td class="">{{ $v->user_info->phone }}</td>
                                <td class="">{{ $v->created_at }}</td>
                                <td class="">
                                    <a href="/admin/user/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                                    <a href="" class="btn btn-danger">删除</a>
                                </td>
                            </tr>
                            @endforeach
                                
                             </tbody>
                         </table>
                                <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_1_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_1_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a><a tabindex="0" class="paginate_button">3</a><a tabindex="0" class="paginate_button">4</a><a tabindex="0" class="paginate_button">5</a></span><a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">Next</a><a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">Last</a></div></div>
                    </div>
                </div>
@endsection