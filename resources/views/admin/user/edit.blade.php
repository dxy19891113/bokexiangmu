
@extends('admin/layout/index')



@section('content')

<!--显示验证错误的提示-->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/user/{{ $data->id }}" method="post">
                    		{{ csrf_field() }}
                            {{ method_field('PUT') }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">用户名</label>
                    				<div class="mws-form-item">
                    		<input type="text" name="uname" value="{{ $user->uname }}"class="small">
                    				</div>
                    			</div>
                               
                    			
                    			

                    			

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">邮箱</label>
                    				<div class="mws-form-item">
                    		<input type="text" name="email" value="{{ $user_info->uid }}"class="small">
                    				</div>
                    			</div>

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">手机</label>
                    				<div class="mws-form-item">
                    		<input type="text" name="phone" value="{{ $user_info->uid }}"class="small">
                    				</div>
                    			</div>
                   
                    		</div>
                    		<div class="mws-button-row">
                    			<button type="submit" class="btn btn-warning">修改</button>
                    	
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection