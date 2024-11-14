@extends('layouts.front')

@section('content')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text">Login</h1>
      <div class="row center">
        <h5 class="center-align green-text">Masukan Data yang valid!</h5>
        <div class='row'>
        <form action="{{route('login')}}">
            @method('POST')
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">smartphone</i>
                    <input id="text_telephone" type="tel" class="validate">
                    <label for="text_telephone">Handphone</label>
                </div>
            </div>
            <div class='row'>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="text_password" type="text" class="validate">
                    <label for="text_password">Password</label>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s12'>
                    <input type="button" class='btn btn-primary' value="Masuk">
                </div>
                <p>Belum punya akun? <a href='{{ route("register") }} '>Register</a></p>
            </div>
          </form>
        </div>
        
      </div>
      <br><br>
    </div>
  </div>
  @endsection