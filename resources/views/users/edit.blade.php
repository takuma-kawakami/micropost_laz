@extends('layouts.app')

@section('content')

<form method="post" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
  @csrf
  @method('PATCH')

  <label for="profile_image">プロフィール画像</label>

  <label for="profile_image" class="btn">
    <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img">
    <input id="profile_image" type="file"  name="profile_image" onchange="previewImage(this);">
  </label>

  <button type="submit" class="btn btn-primary">
    変更
  </button>
</form>

<script>
  function previewImage(obj)
  {
    var fileReader = new FileReader();
    fileReader.onload = (function() {
      document.getElementById('img').src = fileReader.result;
    });
    fileReader.readAsDataURL(obj.files[0]);
  }
</script>

@endsection