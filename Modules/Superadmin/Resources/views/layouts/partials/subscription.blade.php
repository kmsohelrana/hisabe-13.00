@can('subscribe')
	<li class="{{ $request->segment(1) == 'subscription' ? 'active' : '' }}">
		<a href="{{action('\Modules\Superadmin\Http\Controllers\SubscriptionController@index')}}">
			<i class="fa fa-refresh"></i>
			<span class="title">
				@lang('superadmin::lang.subscription')
			</span>
		</a>
	</li>
        <li class="{{ $request->segment(1) == 'subscription' ? 'active' : '' }}">
		<a href="{{action('\Modules\Superadmin\Http\Controllers\SubscriptionController@ShowSubscriptionList')}}">
			<i class="fa fa-bar-chart"></i>
			<span class="title">
                            @lang('lang_v1.subscription_list')               
			</span>
		</a>
	</li>
@endcan