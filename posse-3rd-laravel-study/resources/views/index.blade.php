@section('content')
      <p>{{$msg}}</p>
      <form action="/hello" method="post">
      <table>
            @csrf
            <tr><th>name: </th><td><input type="text" name="name"></td>
            <tr><th>mail: </th><td><input type="text" name="mail"></td>
            <tr><th>age: </th><td><input type="text" name="age"></td>
            <tr><th>: </th><td><input type="submit" value="send"></td></tr>
      </table>
      </form>
@endsection