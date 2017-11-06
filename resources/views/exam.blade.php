@include('header')
<section>
    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                <h2>Экзамен</h2>
                <ul class = "exam_voprosy">
                    <?$item = 1;?>
                    @foreach($vopros as $vop)
                        @if($item == 1)
                            <li><a id = "{{$item}}" class = "select" href = "#" onclick = "exam_load_data({{$vop->id}});">{{$item}}</a></li>
                        @else
                            <li><a id = "{{$item}}" href = "#" onclick = "exam_load_data({{$vop->id}});">{{$item}}</a></li>
                        @endif
                        <?$item++;?>
                    @endforeach	
                </ul>
            </div>
        </div>
            
        <div class = "row">
            <div class = "col-md-9">
                <?$item = 1;?>
                @foreach($vopros as $vop)
                    @if($item == 1)    						
                        <p class = "name_vopros">{{$vop->name}}</p>
                        <div class = "img_vopros"><img src = "/{{$vop->image}}" alt = ""/></div>
                    @endif        
                    <?$item++;?>    
                @endforeach
                
                <h3>Варианты ответа</h3>	
                <ol class = "exam_variants">
                    @foreach($variants as $variant)
                        <li o_id = "{{$variant->id}}" v_id = "{{$variant->vopros}}" stat = "{{$variant->verno}}"><span>{{ $variant->name }}</span></li>
                    @endforeach
                </ol>                
            </div>                
        </div>
    </div>
</section>        
@include('footer')