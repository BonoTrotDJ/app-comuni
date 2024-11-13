<h2>ELENCO CAP</h2>
@isset($dati)
    <ul>
    @foreach($dati as $dato)
    <li><input type="radio" name="listacap" value="{{$dato->cap}}">{{$dato->cap}}</li>
    @endforeach
    </ul>
@endisset
