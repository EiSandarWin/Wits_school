@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>新規追加</h2>{{--create template detail--}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('m_template_details.index') }}"> 戻る</a>{{--back--}}
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('m_template_details.store') }}" method="POST">
    	@csrf


         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="fileInput"><strong>確認事項</strong> </label>{{--template detail--}}
                    <select class="form-control" name="template_id">
                    @foreach($templates as $template)
                    <option value="{{$template->id}}">{{$template->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>確認内容:</strong>{{--description--}}
                    <textarea class="form-control" style="height:150px" name="description" placeholder="確認内容"></textarea>{{--description--}}
                </div>
            </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">登録</button>{{--submit--}}
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection
