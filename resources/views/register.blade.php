@extends('layouts.login')

@section('content')

		<div class="text-center">
		<img src="{{ asset('frontend/default/images/logo-acc.png') }}" alt="{{ config('sximo.cnf_appname') }}" style="width: 180px!important;
        height: 65px!important;" />
		<h3 style="color: #86c5e8; margin-bottom: 20px;">Sign Up</h3>        
	    </div>
        <!--<p class="text-center m-t"> {{ config('sximo.cnf_appdesc') }}  </p>-->
				
	
 
	    	@if(Session::has('message'))
				{!! Session::get('message') !!}
			@endif
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		
		<div class="form-group has-feedback">
              <div class="input-group">               
               {!! Form::text('username', null, array('class'=>'form-control','required'=>'true','placeholder'=>'Username' )) !!}
               <div class="input-group-addon">
            	<i class="fa fa-user" style="font-size: 15px;"></i> 
               </div>
              </div>
        </div> 
             
        <div class="form-group has-feedback row">
        	<div class="col-md-6">
              <div class="input-group">               
               {!! Form::text('firstname', null, array('class'=>'form-control','style'=>'padding-right:12px;','required'=>'true','placeholder'=>'First Name'  )) !!}
               <div class="input-group-addon">
            	<i class="fa fa-user" style="font-size: 15px;"></i> 
               </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="input-group">               
               {!! Form::text('lastname', null, array('class'=>'form-control', 'style'=>'padding-right:12px;', 'required'=>'','placeholder'=>'Last Name' )) !!}
               <div class="input-group-addon">
            	<i class="fa fa-user" style="font-size: 15px;"></i> 
               </div>
              </div>
             </div>
         </div> 
             
             <div class="form-group has-feedback">
              <div class="input-group">               
               {!! Form::text('email', null, array('class'=>'form-control', 'required'=>'true','placeholder'=> __('core.email'))) !!}
               <div class="input-group-addon">
            	<i class="fa fa-envelope" style="font-size: 15px;"></i> 
               </div>
              </div>
        </div> 
        
      <div class="form-group has-feedback row">
      <div class="col-md-6">
              <div class="input-group">               
               {!! Form::password('password', array('class'=>'form-control','style'=>'padding-right:12px;','required'=>'true','placeholder'=>'Password')) !!}
               <div class="input-group-addon">
            	<i class="fa fa-lock" style="font-size: 15px;"></i> 
               </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="input-group">               
               {!! Form::password('password_confirmation', array('class'=>'form-control','style'=>'padding-right:12px;','required'=>'true','placeholder'=>'Confirm')) !!}
               <div class="input-group-addon">
            	<i class="fa fa-sign-in" style="font-size: 15px;"></i> 
               </div>
              </div>
             </div>
         </div> 

		@if(config('sximo.cnf_recaptcha') =='true') 
		<div class="form-group has-feedback  animated fadeInLeft delayp1">
			<label class="text-left"> Are u human ? </label>	
			<div class="g-recaptcha" data-sitekey="{{config('sximo.cnf_recaptchapublickey')}}"></div>
			
			<div class="clr"></div>
		</div>	
	 	@endif						

      <div class="row form-actions">
        <div class="col-sm-12">
          <button type="submit" style="width:100%;float: right;background-color: #f28d0a!important;border-color: #f28d0a !important;width: 94px;" class="btn btn-primary pull-right"><i></i> @lang('core.signup')	</button>
       </div>
      </div>
	  <p style="padding:10px 0; background-color: #808080; color: white;margin-top: 15px;" class="text-center">
	  <a href="{{ URL::to('user/login')}}" style="color:white"> @lang('core.signin')   </a> | <a href="{{ URL::to('')}}" style="color:white"> @lang('core.backtosite')   </a> 
   		</p>
 {!! Form::close() !!}

<script type="text/javascript">
	$(document).ready(function(){
		$('#register-form').parsley();
	})
</script>		
@stop
