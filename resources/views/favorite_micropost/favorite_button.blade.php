@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favoriting($micropost->id))
        <form method="POST" action="{{ route('user.unfavorite', $micropost->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-block normal-case" 
                onclick="return confirm('id = {{ $user->id }} のお気に入りを外します。よろしいですか？')">気にいらない</button>
        </form>
    @else
        <form method="POST" action="{{ route('user.favorite', $micropost->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-block normal-case">気に入った</button>
        </form>
    @endif
@endif