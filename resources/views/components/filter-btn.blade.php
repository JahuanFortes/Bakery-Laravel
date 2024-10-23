@props(['allCategories'])
<form>
    @foreach($allCategories as $category)
        <input value="{{$category->id}}">{{$category->title}}</input>
        <label></label>
    @endforeach


    <label for="#"></label>
    <select id="#" name="category" class="rounded-md shadow-lg bg-gray-800">

    </select>

</form>
