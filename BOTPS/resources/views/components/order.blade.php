<div class="comm_div">
    <div class="customer_name"><b>Customer ID: {{key($cWr)}}</b> </div>
    @php $total = 0 @endphp
    <!-- product description -->
    <div>
        @foreach($cWr as $cds)
            @foreach($cds as $cd)
                @foreach($cd as $c)
                    @php $total += $c->totalPrice @endphp
                    @component('components.product_des',['c' => $c])
                    @endcomponent    
                @endforeach
            @endforeach
        @endforeach
    </div>
    <div class="totalPrice"><b>Total {{$total}} $</b> </div>
    <!-- btn -->
    <x-botton />
</div>