@if (Auth::id() == $user->id)
    <a class="btn btn-outline" href="{{ route('users.edit', $user->id) }}">プロフィール画像を編集</a>
@endif