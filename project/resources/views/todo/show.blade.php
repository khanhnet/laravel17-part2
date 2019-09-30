@extends('todo.master')
@section('content')
<div class="container">
    <a href="{{route('todos.index')}}" class="btn btn-primary">Back</a>
        <legend>Detail</legend>
        <h1>Học tập trình web</h1>
    <hr>
    <div>
        Hiện nay, ứng dụng Web chiếm trên 50% khối lượng ứng dụng trên thế giới. Ngoài các ứng dụng Web thông thường thì ứng dụng di động cũng tương tác với ứng dụng Web, ứng dụng Desktop cũng tương tác với ứng dụng Web. Có thể nói ứng dụng Web có mặt ở khắp nơi và ngày càng phát triển. Hầu hết các ngôn ngữ lập trình phổ biến đều hỗ trợ ứng dụng Web như Java, C#, PHP, Python, Ruby …

        Có nhiều cách để bắt đầu học lập trình, ví dụ như ở các trường thường dạy Pascal hoặc C trước, có nơi dạy Python trước v.v.. Tất nhiên, với cách nào mà bạn nỗ lực và theo đuổi đến cùng thì đều đi đến thành công. Trong bài viết này, chúng tôi trình bày một cách tiếp cận sát với thực tế hơn nhằm giúp các bạn sinh viên CNTT hay các bạn mới bắt đầu học lập trình yêu thích lập trình Web có thể dễ dàng nắm bắt và cách học vừa học vừa hành cũng thú vị hơn.
    </div>
</div>
@endsection