<style>
    .btn-1:hover {
        background-color: #820f0e;
        color: white;
    }

    .dashboard {
        cursor: pointer;
        padding-right: 10px;
        width: 300px;
        border-radius: 100px;
        height: 50px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .dashboard.active {
        background-color: #820f0e !important;
    }
</style>
<div class=" col-lg-3 col-md-4" style="margin-top: 100px;">
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="{{ URL('account') }}" class="  dashboard btn btn-outline-danger  btn-1 <?php echo (isset($segment[0]) and $segment[0] == 'account') ? 'active' : ''; ?>"><i
                class="fas fa-th"></i>
            Dashboard</a>
        <a href="{{ URL('orders') }}" class="dashboard btn btn-outline-danger btn-1 my-2 <?php echo (isset($segment[0]) and $segment[0] == 'orders') ? 'active' : ''; ?>"><i
                class="fa fa-user"></i> Order History</a>

        @if (Auth::user()->role == 3)
            <a href="{{ URL('view_product') }}" class="dashboard btn btn-outline-danger btn-1 my-2 <?php echo (isset($segment[0]) and $segment[0] == 'view_product' ) ? 'active' : ''; ?><?php echo (isset($segment[0]) and $segment[0] == 'add_product' ) ? 'active' : ''; ?>"><?php echo (isset($segment[0]) and $segment[0] == 'edit_product' ) ? 'active' : ''; ?><i
                    class="fa fa-user"></i>Products</a>
        @endif

        <a href="{{ URL('account-detail') }}" class="dashboard btn btn-outline-danger btn-1 my-2 <?php echo (isset($segment[0]) and $segment[0] == 'account-detail') ? 'active' : ''; ?>"><i
                class="fa fa-user"></i> Account Details</a>


        <a href="{{ URL('signout') }}" class="btn-1 dashboard btn btn-outline-danger my-2"><i
                class="fas fa-arrow-circle-left"></i> Logout</a>
    </div>
</div>
