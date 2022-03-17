@include('templates.header')
@include('templates.navbar')
<div class="container-fluid" id="main" style="height: 100vh">
    <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
@foreach ($project_has_flows as $project_has_flow)
@php
    $flow = DB::table('flows')->where('id',$project_has_flow->flow_id)->first();
    $uidata = DB::table('flow_has_uidatas')->where('flow_id',$flow->id)->first();
@endphp
    <div class="pt-3">
        <h4 style="font-weight: bold">{{$flow->name}}</h4>
    </div>
    @if($uidata)
    <div class="p-4">
        @php
            $decoded = json_decode($uidata->written_content_data);
        @endphp
        @foreach ($decoded as $ded)
        <p >{!!$ded!!}</p>
        @endforeach
    </div>
    @else
    <div class="pt-3">
        <p>No data yet...</p>
    </div>
    @endif
@endforeach
</div>
@include('templates.footer')