@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>確認項目</h2>{{--template detail--}}
            </div>
            <div class="pull-right">
                @can('m_template_details-create')
                <a class="btn btn-success" href="{{ route('m_template_details.create') }}"> 新規追加</a>{{--create template detail--}}
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>確認事項</th>{{--teimplate detail--}}

            <th>確認内容</th>{{--descritption--}}
            <th width="280px">操作</th>{{--action--}}
        </tr>
	    @foreach ($m_template_details as $m_template_detail)
	    <tr>
            <td>{{ $m_template_detail->id }}</td>
	        <td>{{ $m_template_detail->template->name }}</td>

	        <td>{{ $m_template_detail->description }}</td>
	        <td>
                <form action="{{ route('m_template_details.destroy',$m_template_detail->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('m_template_details.show',$m_template_detail->id) }}">表示</a>{{--show--}}
                    @can('m_template_details-edit')
                    <a class="btn btn-primary" href="{{ route('m_template_details.edit',$m_template_detail->id) }}">編集</a>{{--edit--}}
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('m_template_details-delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('削除してよろしいですか')">削除</button>{{--delete--}}
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $m_template_details->links() !!}


<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection
