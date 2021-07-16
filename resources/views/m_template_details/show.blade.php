@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> 表示確認項目</h2>{{--create template detail--}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('m_template_details.index') }}"> 戻る</a>{{--back--}}
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>確認項目ID:</strong>{{--template detail ID--}}
                {{ $m_template_detail->id }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>確認項目名:</strong>{{--template detail name--}}
                {{ $m_template_detail->template->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>確認内容:</strong>{{--description--}}
                {{ $m_template_detail->description }}
            </div>
        </div>
    </div>
@endsection
<p class="text-center text-primary"><small>Wits.com</small></p>
