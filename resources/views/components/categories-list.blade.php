@props(['categories'])
<div>
    <label for="#"></label>
    <select id="#" name="#">
        @foreach($categories as $category)
            <option value="{{$category->title}}">{{$category->title}}</option>
        @endforeach
    </select>
</div>
