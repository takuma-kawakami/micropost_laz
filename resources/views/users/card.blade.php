<div class="card border border-base-300">
    <div class="card-body bg-base-200 text-4xl">
        <h2 class="card-title">{{ $user->name }}</h2>
    </div>
   {{-- @if (!empty($uploadFile)) --}}
        <figure>
            <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="">
        </figure>
    {{-- 
    @else
        <figure>
            {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 
            <img src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
        </figure>
    @endif
    --}}
    
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')
@if (Auth::id() == $user->id)
    <a class="btn btn-outline" href="{{ route('users.edit', $user->id) }}">プロフィール画像を編集</a>
@endif