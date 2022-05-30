<nav class="active" id="sidebar">
    <ul class="list-unstyle lead">
        <li class="active">
            <a href=""><i class="fa fa-home fa-lg"></i> Trang chủ</a>
        </li>

        <li>
            <a href="{{ route('orders.index') }}"> <i class="fa fa-box fa-lg"></i> Danh sách đơn hàng</a>
        </li>

        <li>
            <a href="{{ route('transactions.index') }}"> <i class="fa fa-money-bill fa-lg"></i>Danh sách giao dịch</a>
        </li>

        <li>
            <a href="{{ route('products.index') }}"> <i class="fa fa-truck fa-lg"></i>Danh sách sản phẩm</a>
        </li>

        <li>
            <a href="{{ route('sections.index') }}"> <i class="fa fa-truck fa-list"></i>Danh mục sản phẩm</a>
        </li>

        <li>
            <a href="">Trang chủ</a>
        </li>

        <li>
            <a href="">Trang chủ</a>
        </li>

        <li>
            <a href="">Trang chủ</a>
        </li>

        <li>
            <a href="">Trang chủ</a>
        </li>

        <li>
            <a href="">Trang chủ</a>
        </li>
    </ul>
</nav>

<style>
    #sidebar ul.lead{
        border: 1px solid #47748b;
        width: fit-content;
    }

    #sidebar ul li a{
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #008b8b;
    }

    #sidebar ul li a:hover{
        color: #fff;
        background: #008b8b;
        text-decoration: none !important;
    }

    #sidebar ul{
        list-style: none !important;
    }

    #sidebar ul li a i{
        margin-right: 10px;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"]{
        color:#fff;
        background:#008b8b;
    }
</style>
