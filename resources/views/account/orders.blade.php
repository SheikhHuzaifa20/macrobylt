@extends('layouts.main')
@section('title', 'Order History')
@section('content')

    <?php $segment = Request::segments(); ?>

    <section class="inner-banner py-4" style="background: linear-gradient(135deg, #161b22 0%, #0d1013 100%); border-bottom: 1px solid rgba(0, 210, 255, 0.15);">
        <div class="container">
            <div class="row text-center py-3">
                <div class="col-12">
                    <span class="text-uppercase font-weight-bold px-3 py-1 mb-2 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.8rem; letter-spacing: 2px;">
                        MY ORDERS
                    </span>
                    <h1 class="mb-2" style="font-family: 'Bebas Neue', sans-serif; color: #ffffff; font-size: 2.5rem; letter-spacing: 2px;">ORDER HISTORY</h1>
                    <p style="color: #94a3b8; font-size: 0.95rem;">Track and manage your previous orders</p>
                </div>
            </div>
        </div>
    </section>

    <main style="background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%); min-height: 80vh; padding: 40px 0;">
        <div class="container">
            <div class="row">
                @include('account.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="p-4 p-md-5" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                        <h4 class="text-uppercase font-weight-bold mb-3" style="font-family: 'Bebas Neue', sans-serif; color: #00d2ff; letter-spacing: 1.5px; font-size: 1.6rem;">
                            <i class="fa-solid fa-receipt mr-2"></i> Order Records
                        </h4>
                        <div style="height: 1px; background: linear-gradient(90deg, rgba(0,210,255,0.3), transparent); margin-bottom: 25px;"></div>

                        <div class="table-responsive">
                            <table id="example" class="table gg-table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach ($ORDERS as $val)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $val->delivery_first_name }}</td>
                                            <td>{{ $val->order_email }}</td>
                                            <td>{{ $val->delivery_phone_no }}</td>
                                            <td>{{ date('d M, Y h:i a', strtotime($val->created_at)) }}</td>
                                            <td style="color: #00d2ff; font-weight: 700;">${{ $val->order_total }}</td>
                                            <td>
                                                <a class="gg-view-btn" href="{{ route('invoice', [$val->id]) }}">
                                                    <i class="fa-solid fa-file-invoice mr-1"></i> View Invoice
                                                </a>
                                            </td>
                                        </tr>
                                        @php $count++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @if (session('error'))
        <script>alert('{{ session('error') }}')</script>
    @endif
    @if (session('success'))
        <script>alert('{{ session('success') }}')</script>
    @endif

@endsection

@section('css')
    <style>
        .gg-table {
            border-collapse: separate;
            border-spacing: 0 6px;
            color: #cbd5e1;
            font-size: 0.95rem;
        }
        .gg-table thead tr {
            background: linear-gradient(135deg, #0099cc, #00d2ff);
        }
        .gg-table thead th {
            color: #ffffff !important;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding: 14px 16px;
            border: none !important;
        }
        .gg-table tbody tr {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(0,210,255,0.1);
            transition: all 0.2s ease;
        }
        .gg-table tbody tr:hover {
            background: rgba(0, 210, 255, 0.08);
            border-color: rgba(0,210,255,0.3);
        }
        .gg-table tbody td {
            padding: 14px 16px;
            border: none !important;
            border-top: 1px solid rgba(0,210,255,0.08) !important;
            color: #cbd5e1;
            vertical-align: middle;
        }
        .gg-view-btn {
            display: inline-flex;
            align-items: center;
            background: rgba(0,210,255,0.1);
            color: #00d2ff;
            border: 1px solid rgba(0,210,255,0.3);
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }
        .gg-view-btn:hover {
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #ffffff !important;
            border-color: transparent;
            box-shadow: 0 4px 12px rgba(0,210,255,0.3);
        }
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background: #0d1013 !important;
            border: 1px solid rgba(0,210,255,0.2) !important;
            border-radius: 8px !important;
            color: #ffffff !important;
            padding: 6px 12px !important;
        }
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            color: #94a3b8 !important;
        }
        .dataTables_wrapper .paginate_button {
            background: rgba(0,210,255,0.08) !important;
            border: 1px solid rgba(0,210,255,0.2) !important;
            border-radius: 8px !important;
            color: #00d2ff !important;
        }
        .dataTables_wrapper .paginate_button.current,
        .dataTables_wrapper .paginate_button:hover {
            background: linear-gradient(135deg, #0099cc, #00d2ff) !important;
            border-color: transparent !important;
            color: #ffffff !important;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search orders...",
                    "lengthMenu": "Show _MENU_ orders"
                }
            });
        });
    </script>
@endsection
