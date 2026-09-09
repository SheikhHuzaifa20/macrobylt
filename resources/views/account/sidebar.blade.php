<style>
    /* Sidebar nav buttons - replace red #820f0e with cyan blue */
    .btn-1:hover {
        background: linear-gradient(135deg, #0099cc, #00d2ff) !important;
        border-color: #00d2ff !important;
        color: white !important;
    }

    .dashboard {
        cursor: pointer;
        padding-right: 10px;
        width: 100%;
        max-width: 280px;
        border-radius: 12px;
        height: 50px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 12px;
        padding-left: 20px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease !important;
        border: 1px solid rgba(0, 210, 255, 0.2) !important;
        background: rgba(0, 210, 255, 0.05) !important;
        color: #cbd5e1 !important;
    }

    .dashboard:hover {
        background: rgba(0, 210, 255, 0.15) !important;
        border-color: rgba(0, 210, 255, 0.5) !important;
        color: #00d2ff !important;
        box-shadow: 0 4px 15px rgba(0, 210, 255, 0.15) !important;
    }

    .dashboard.active {
        background: linear-gradient(135deg, #0099cc, #00d2ff) !important;
        border-color: #00d2ff !important;
        color: #ffffff !important;
        box-shadow: 0 4px 20px rgba(0, 210, 255, 0.35) !important;
    }

    .btn-outline-danger {
        border-color: rgba(0, 210, 255, 0.3) !important;
        color: #cbd5e1 !important;
    }
</style>
<div class="col-lg-3 col-md-4" style="margin-top: 40px;">
    <div class="myaccount-tab-menu nav d-flex flex-column align-items-start" role="tablist">

        <div class="mb-3 w-100">
            <p class="text-uppercase font-weight-bold mb-3" style="color: #00d2ff; font-size: 0.75rem; letter-spacing: 2px; padding-left: 5px;">NAVIGATION</p>
        </div>

        <a href="{{ URL('account') }}" class="dashboard btn btn-1 <?php echo (isset($segment[0]) and $segment[0] == 'account') ? 'active' : ''; ?>">
            <i class="fas fa-th-large" style="font-size: 0.9rem;"></i>
            Dashboard
        </a>

        <a href="{{ URL('orders') }}" class="dashboard btn btn-1 <?php echo (isset($segment[0]) and $segment[0] == 'orders') ? 'active' : ''; ?>">
            <i class="fa fa-list-alt" style="font-size: 0.9rem;"></i>
            Order History
        </a>

        @if (Auth::user()->role == 3)
            <a href="{{ URL('view_product') }}" class="dashboard btn btn-1 <?php echo (isset($segment[0]) and $segment[0] == 'view_product') ? 'active' : ''; ?> <?php echo (isset($segment[0]) and $segment[0] == 'add_product') ? 'active' : ''; ?> <?php echo (isset($segment[0]) and $segment[0] == 'edit_product') ? 'active' : ''; ?>">
                <i class="fa fa-box" style="font-size: 0.9rem;"></i>
                Products
            </a>
        @endif

        <a href="{{ URL('account-detail') }}" class="dashboard btn btn-1 <?php echo (isset($segment[0]) and $segment[0] == 'account-detail') ? 'active' : ''; ?>">
            <i class="fa fa-user-circle" style="font-size: 0.9rem;"></i>
            Account Details
        </a>

        <a href="{{ URL('signout') }}" class="dashboard btn btn-1 mt-3" style="border-color: rgba(255,100,100,0.3) !important; color: #ff6b6b !important; background: rgba(255,100,100,0.05) !important;">
            <i class="fas fa-sign-out-alt" style="font-size: 0.9rem;"></i>
            Logout
        </a>
    </div>
</div>
