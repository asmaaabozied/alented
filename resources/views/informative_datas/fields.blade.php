@section('css')
    <script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/config.js?t=J5S9"></script>
@endsection

<!-- Contact Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('contact_email') ? 'has-error' : '' }}">
    {!! Form::label('contact_email', __('models/informativeDatas.fields.contact_email')) !!}<span class="astrix">*</span>:
    {!! Form::email('contact_email', null, ['class' => 'form-control']) !!}
    @if($errors->has('contact_email'))
        <span class="help-block">
            <strong>{{ $errors->first('contact_email') }}</strong>
        </span>
    @endif
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    {!! Form::label('phone_number', __('models/informativeDatas.fields.phone_number')) !!}<span class="astrix">*</span>:
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('phone_number'))
        <span class="help-block">
            <strong>{{ $erros->first('phone_number') }}</strong>
        </span>
    @endif
</div>

<!-- About En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('about_en') ? 'has-error' : '' }}">
    {!! Form::label('about_en', __('models/informativeDatas.fields.about_en')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('about_en', null, ['class' => 'form-control', 'id' => 'editor1']) !!}
    @if($errors->has('about_en'))
        <span class="help-block">
            <strong>{{ $errors->first('about_en') }}</strong>
        </span>
    @endif
</div>

<!-- About Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('about_ar') ? 'has-error' : '' }}">
    {!! Form::label('about_ar', __('models/informativeDatas.fields.about_ar')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('about_ar', null, ['class' => 'form-control', 'dir' => 'rtl', 'id' => 'editor2']) !!}
    @if($errors->has('about_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('about_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Our Mission En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('our_mission_en') ? 'has-error' : '' }}">
    {!! Form::label('our_mission_en', __('models/informativeDatas.fields.our_mission_en')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('our_mission_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('our_mission_en'))
        <span class="help-block">
            <strong>{{ $errors->first('our_mission_en') }}</strong>
        </span>
    @endif
</div>

<!-- Our Mission Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('our_mission_ar') ? 'has-error' : '' }}">
    {!! Form::label('our_mission_ar', __('models/informativeDatas.fields.our_mission_ar')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('our_mission_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('our_mission_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('our_mission_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Privecy Policy En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('privecy_policy_en') ? 'has-error' : '' }}">
    {!! Form::label('privecy_policy_en', __('models/informativeDatas.fields.privecy_policy_en')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('privecy_policy_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('privecy_policy_en'))
        <span class="help-block">
            <strong>{{ $errors->first('privecy_policy_en') }}</strong>
        </span>
    @endif
</div>

<!-- Privecy Policy Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('privecy_policy_ar') ? 'has-error' : '' }}">
    {!! Form::label('privecy_policy_ar', __('models/informativeDatas.fields.privecy_policy_ar')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('privecy_policy_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('privecy_policy_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('privecy_policy_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Terms & Conditions En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('terms_conditions_en') ? 'has-error' : '' }}">
    {!! Form::label('terms_conditions_en', __('models/informativeDatas.fields.terms_conditions_en')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('terms_conditions_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('terms_conditions_en'))
        <span class="help-block">
            <strong>{{ $errors->first('terms_conditions_en') }}</strong>
        </span>
    @endif
</div>

<!-- Terms & Conditions Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('terms_conditions_ar') ? 'has-error' : '' }}">
    {!! Form::label('terms_conditions_ar', __('models/informativeDatas.fields.terms_conditions_ar')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('terms_conditions_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('terms_conditions_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('terms_conditions_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Facebook Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
    {!! Form::label('facebook_link', __('models/informativeDatas.fields.facebook_link')) !!}<span class="astrix">*</span>:
    {!! Form::text('facebook_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('facebook_link'))
        <span class="help-block">
            <strong>{{ $errors->first('facebook_link') }}</strong>
        </span>
    @endif
</div>

<!-- Youtube Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('youtube_link') ? 'has-error' : '' }}">
    {!! Form::label('youtube_link', __('models/informativeDatas.fields.whatsapp_link')) !!}<span class="astrix">*</span>:
    {!! Form::text('whatsapp_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('whatsapp_link'))
        <span class="help-block">
            <strong>{{ $errors->first('whatsapp_link') }}</strong>
        </span>
    @endif
</div>

<!-- Twitter Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('twitter_link') ? 'has-error' : '' }}">
    {!! Form::label('twitter_link', __('models/informativeDatas.fields.twitter_link')) !!}<span class="astrix">*</span>:
    {!! Form::text('twitter_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('twitter_link'))
        <span class="help-block">
            <strong>{{ $errors->first('twitter_link') }}</strong>
        </span>
    @endif
</div>

<!-- Instgram Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('instgram_link') ? 'has-error' : '' }}">
    {!! Form::label('instgram_link', __('models/informativeDatas.fields.instgram_link')) !!}<span class="astrix">*</span>:
    {!! Form::text('instgram_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('instgram_link'))
        <span class="help-block">
            <strong>{{ $errors->first('instgram_link') }}</strong>
        </span>
    @endif
</div>

<!-- Ads Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('free_ads_number') ? 'has-error' : '' }}">
    {!! Form::label('free_ads_number', __('models/informativeDatas.fields.free_ads_number')) !!}<span class="astrix">*</span>:
    {!! Form::number('free_ads_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('free_ads_number'))
        <span class="help-block">
            <strong>{{ $errors->first('free_ads_number') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ url('/home') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>


@push('scripts')
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('editor1')
          CKEDITOR.replace('editor2')
        })
    </script>
@endpush
