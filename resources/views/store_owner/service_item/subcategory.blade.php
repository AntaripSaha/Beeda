@foreach($child_categories as $child)
    @if(isset($child->child_categories) && count($child->child_categories)>0)
    <option value="{{$child->id}}" @if(isset($parent_category_id) && $parent_category_id == $child->id) selected @endif>
        @for($i=0; $i< $child->level; $i++)
            -
        @endfor
        {{$child->name}}
    </option>
     @include('store_owner.service_item.subcategory', ['child_categories'=> $child->child_categories])
    @else
    <option value="{{$child->id}}" @if(isset($parent_category_id) && $parent_category_id == $child->id) selected @endif>
        @for($i=0; $i< $child->level; $i++)
            -
        @endfor
        {{$child->name}}
    </option>
    @endif
@endforeach
