@props(['allCategories'])
<div>
    <label for="#"></label>
    <select id="#" name="category" class="rounded-md shadow-lg bg-gray-800">
        @foreach($allCategories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
    
</div>
