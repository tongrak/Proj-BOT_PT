<div class="btn_frameAlter">

    <form method="post" action="{{ route('admin.add.sale', key($cusID)) }}" onclick="deniend()">
        @csrf
        <button class="confirm_btn">
            Accept Commission
        </button>
    </form>
</div>