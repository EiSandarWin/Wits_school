@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> 表示 確認事項名</h2> {{--Show Template--}}
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('m_templates.index') }}"> 戻る</a> {{--back--}}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>氏名:</strong> {{--Name--}}
            {{ $m_template->name }}
        </div>
    </div>

</div>
<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection

