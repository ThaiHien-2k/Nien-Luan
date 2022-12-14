@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong><br>
        <p>{{ $comment->created_at->format('d/m/Y') }}</p>
        <p>- {{ $comment->body }}</p>
        <hr>
        <a href="" id="reply"></a>
        <form method="product" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type=text name=body class="form-control" />
                <input type=hidden name=product_id value="{{ $product_id }}" />
                <input type=hidden name=parent_id value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type=submit class="btn btn-warning" value="Trả lời" />
            </div>
        </form>
        @include('products.comment', ['comments' => $comment->replies])
    </div>
@endforeach