<table>
    <form action="/admin" method="post">
    @csrf
        <tr><th>message: </th><td><input type="text" name="message"
        value="{{old('name')}}"></td></tr>
        {{-- <tr><th>url: </th><td><input type="text" name="url"
        value="{{old('')}}"></td></tr> --}}
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </form>
</table>
