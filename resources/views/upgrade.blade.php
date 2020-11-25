@extends('layouts.master')
@section('title')
Upgrade
@endsection
@section('content')
<div class="container">
  <div class="ui-block">
    <h1>Upgrade Membership</h1>
    <div class="row">
      @for($i=1;$i<4;$i++)
        <div class="col-sm-4 col-xs-6 text-center form-group">
            <div class="tg-checkbox">
                <label for="pack-{{$i}}">
                    <div class="tg-packages">
                      <h2>Package {{$i}}</h2>
                      <h3><strong>$250</strong></h3>
                      <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </label>
                <input type="radio" name="packs" value="" id="pack-{{$i}}">
            </div>
        </div>
      @endfor
      <div class="col-sm-12 text-center">
        <input class="btn btn-primary btn-lg" type="submit" name="" value="Submit">
      </div>
    </div>
  </div>
</div>
@endsection