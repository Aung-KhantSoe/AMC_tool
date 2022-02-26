@include('templates.header')
@include('templates.navbar')
<div class="container-fluid" id="main" style="height: 100vh">
    <span style="font-size:30px;cursor:pointer;padding-bottom:50px;margin-left:0;" onclick="openNav()">&#9776;</span>
    <div>
        <a href="{{route('cardcreate')}}"><button type="button" class="btn btn-success" >Create New Card</button></a>
        <a href="{{route('carditemcreate')}}"><button type="button" class="btn btn-warning" >Create New Item</button></a>
    </div>
</div>

@include('templates.footer')