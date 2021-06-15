@php if(!empty($_GET['message'])) { $get_message = $_GET['message']; } @endphp

@if(!empty($get_message) && $get_message == "empty")
<div class="container alert alert-danger">
    <p>Not Found</p>
</div>
@endif
