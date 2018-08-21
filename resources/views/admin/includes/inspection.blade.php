@if(old('item_id'))
        @foreach(old('item_id') as $key=>$item)
            <script>
                form = JSON.stringify({!! old('form.'.$key) !!});
                popForm({{old('type_id.'.$key)}},"{{old('typeName.'.$key)}}",{{old('item_id.'.$key)}},"{{old('itemName.'.$key)}}",form)
            </script>
        @endforeach
    @else
        @foreach($items as $item)
            <script>
                form = JSON.stringify({!! $item->form !!});
                popForm({{$item->type_id}},"{{$item->type->type}}",{{$item->id}},"{{$item->name}}",form)
            </script>
        @endforeach
@endif