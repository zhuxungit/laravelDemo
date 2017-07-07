<html>
<head>
    <title>t0td supply a title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div>{{isset($address)?$address: '不知道'}}</div>

{{--@foreach($name as $k=>$v)--}}
    {{--{{$v}}--}}
    {{--@endforeach--}}

<div>{{date('Y-m-d',$time)}}</div>

</body>
</html>