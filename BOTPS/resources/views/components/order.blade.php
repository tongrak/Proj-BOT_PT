<div class="comm_div">
    <div class="customer_name">Customer ID: {{key($cWr)}} </div>

    <!-- product description -->
    <div>
        @foreach($cWr as $cds)
            @foreach($cds as $cd)
                @foreach($cd as $c)
                    @component('components.product_des',['c' => $c])
                    @endcomponent    
                @endforeach
            @endforeach
        @endforeach
    </div>

    <!-- btn -->
    <x-botton />
</div>