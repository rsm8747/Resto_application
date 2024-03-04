@extends('layout')
@section('content')
<style>
    body {
        color: rgb(173, 40, 151);
      background-image: url('images/res.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
    .block {
  display: block;
  width: 100%;
  border: none;
  background-color: #b3b6b591;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}
.container {
    /* remember to set a width */
    margin-right: auto;
    margin-left: auto;
    margin-top: 12%;
}
    </style>
    <div class="container">
    <div class="col-sm-4 mx-auto">
        <form method="post" action="">
            @csrf
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><u>Add Your Details...</u></i></h3>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="e.g Rahul More" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="e.g Example@gmail.com" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="e.g JM Road, Pune-411021">
            </div>
            <button type="submit" class="btn btn-primary block">Submit</button>
        </form>
    </div>
</div>
@stop