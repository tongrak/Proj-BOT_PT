<div class="btn_frame">
    <form method="post" action="{{ route('admin.cancel.order', key($cusID)) }}">
        @csrf
        <button class="cancel_btn">
            Cancel Order
        </button>
    </form>

    <form method="post" action="{{ route('admin.denied.order', key($cusID)) }}">
        @csrf
        <button class="denied_btn">
            Denied Order
        </button>
    </form>

    <form method="post" action="{{ route('commission.confirm', key($cusID)) }}">
        @csrf
        <button class="confirm_btn">
            Confirm Order
        </button>
    </form>
</div>