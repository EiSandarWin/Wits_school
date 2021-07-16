@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> 表示教室</h2>　{{--Show Branch--}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('m_branch.index') }}"> 戻る</a> {{--Back--}}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $m_branch->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>氏名:</strong> {{--Name--}}
                {{ $m_branch->name }}
            </div>
        </div>

    </div>
@endsection
<p class="text-center text-primary"><small>Wits.com</small></p>
