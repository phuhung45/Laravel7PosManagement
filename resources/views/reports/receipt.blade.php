<div id="invoice-POS">
    <div id="printed_content">
        <center id = "top">
        <div class="logo">Alagie</div>
        <div class="info"></div>
        <h2>POS LTD</h2>
        </center>
    </div>

    <div class="mid">
        <!-- cai nay k nhan ak dung roi bac -->
        <div class="info">
            <h2>Liên hệ chúng tôi</h2>
            <p>Địa chỉ :</p>
            <p>Email : </p>
            <p>Điện thoại :</p>
        </div>
    </div>

    <div class="bot">
        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Sản phẩm</h2></td>
                    <td class="Hours"><h2>Số lượng</h2></td>
                    <td class="Rate"><h2>Đơn giá</h2></td>
                    <td class="Rate"><h2>Giảm giá</h2></td>
                    <td class="Rate"><h2>Tổng tiền</h2></td>
                </tr>

                @foreach ($order_receipt as $key => $receipt)
                {{-- @dd($receipt->quantity) --}}

                <tr class="service">
                    <td class="tableitem"><p class="itemtext">{{ $receipt->product_name ?? 'None'}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ $receipt->quantity ?? 'None'}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ number_format($receipt->unitprice, 2) }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ $receipt->discount ? '' : '0' }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ number_format($receipt->amount, 2) }}</p></td>
                </tr>

                @endforeach

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate"><p class="itemtext">Thuế VAT</p></td>
                    <td class="payment"><p class="itemtext"></p></td>
                </tr>

                <tr  class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate">Tổng:</td>
                    <td class="payment"><h2>$ {{ number_format($order_receipt->sum('amount'), 2) }}</h2></td>
                </tr>
            </table>

            <div class="legalcopy">
                <p class="legal"><strong> ** Cảm ơn quý khách ghé cửa hàng **</strong><br>
                    Sản phẩm đã bao gồm thuế VAT
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 58mm;
        background: #fff;
    }

    #invoice-POS ::selection{
        background: #b912b9;
        color: #fff;
    }

    #invoice-POS ::-moz-selection{
        background: #410c41;
        color: #fff;
    }

    #invoice-POS h1{
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2{
        font-size: 0.5em;
    }

    #invoice-POS h3{
        font-size: 1.2em;
        color: #222;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p{
        font-size: 0.7em;
        line-height: 1.2em;
        color: #666;
    }

    #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot{
        border-bottom: 1px solid #eee;
    }

    #invoice-POS #top{
        min-height: 100px;
    }

    #invoice-POS #mid{
        min-height: 80px;
    }

    #invoice-POS #bot{
        min-height: 50px;
    }

    #invoice-POS #top .logo{
        height: 60px;
        width: 60px;
        background-image: url() no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
        text-align: left;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p{
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        font-size: 0.5em;
        background: #eee;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: 0.5em;
    }

    #invoice-POS .legalcopy {
        margin-top: 5mm;
        text-align: center;
    }
</style>
