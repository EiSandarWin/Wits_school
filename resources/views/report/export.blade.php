<!DOCTYPE html>
<html lang="{{ \Lang::getLocale() }}">
<head>
    <meta charset="utf-8">
</head>
<body>
<table width="100%">
    <thead>
{{--    <tr>--}}
{{--        <th colspan="9">--}}
{{--            Report for {{isset($from_date) ? $from_date: ''}}--}}
{{--            {{isset($from_date) ? '-' : ''}}--}}
{{--            {{isset($to_date) ? $to_date: ''}}--}}
{{--            {{!empty($particular) ? $particular : ''}}--}}
{{--            {{!empty($Group) ? $Group: ''}}--}}
{{--            {{!empty($Type) ? $Type: ''}}--}}
{{--        </th>--}}
{{--    </tr>--}}
    <tr>
        <th>No</th>
        <th>氏名</th>
        <th>氏名(カナ)</th>
        <th>保護者指名</th>
        <th>スタッフ名</th>
        <th>教室名</th>

    </tr>

    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            @foreach ($row as $value)
                <td>{{ $value }}</td>
            @endforeach
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>
