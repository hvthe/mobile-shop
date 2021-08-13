<form method="post" action="{{ route('cart.update')}}">
    @csrf
    @foreach($products as $product)
    <div class="cart-item row prd_id-{{$product->prd_id}}">
        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
            <img src="{{asset('admin/images/'.$product->prd_image)}}">
            <h4>{{ $product->prd_name }}</h4>
        </div>

        <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
            <input type="number" name="quantity[{{ $product->prd_id }}]" data-id="quantity" class="form-control form-blue quantity" value="{{ $cart[$product->prd_id] }}" min="1">
        </div>
        <div class="cart-price col-lg-3 col-md-3 col-sm-12">
            <b>{{ number_format($product->prd_price) }}đ</b>
            <a class="del-Btn" href="{{route('cart.delete',['id' => $product->prd_id])}}">Xóa</a>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
            <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
        </div>
        <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
        <div class="total-bill cart-price col-lg-3 col-md-3 col-sm-12"><b>{{ number_format($total) }}đ</b></div>
    </div>

</form>
<script>
    var submitBtn = document.querySelector('#update-cart');
    if (submitBtn) {
        submitBtn.onclick = function(e) {
            e.preventDefault();
            var link = "{{route('cart.update')}}"
            var token = document.querySelector('input[name=_token]').value
            var input = document.querySelectorAll('input.form-control.form-blue.quantity');
            var dataInput = {
                '_token': token
            };
            var quantity = 0;
            if (input) {
                for (var i = 0; i < input.length; i++) {
                    var inputName = input[i].name;
                    dataInput[inputName] = input[i].value;
                    quantity += Number(input[i].value);
                }
            }
            $.ajax({
                url: link,
                type: "POST",
                data: dataInput
            }).done(function(data) {
                $('#cart-item').html(data)
                document.querySelector('.cart-qtt').innerText = quantity;
            })
        }
    }

    var deleteBtn = document.querySelectorAll('.del-Btn');
    for (var i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].onclick = function(e) {
            e.preventDefault()
            var link = this.href;
            $.ajax({
                'url': link,
                'type': 'GET',
            }).done(function(data) {
                $('#cart-item').html(data)
                var input = document.querySelectorAll('input.form-control.form-blue.quantity');
                var quantity = 0;
                if (input) {
                    for (var i = 0; i < input.length; i++) {
                        quantity += Number(input[i].value);
                    }
                }
                document.querySelector('.cart-qtt').innerText = quantity;
                if (quantity == 0) {
                    var main = document.getElementById('main')
                    var myCart = document.getElementById('my-cart')
                    var customerInfo = document.getElementById('customer')
                    main.removeChild(myCart);
                    main.removeChild(customerInfo);
                    var empty = document.querySelector('.row.mt-3');
                    empty.innerHTML = `
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <img src="http://127.0.0.1:8000/frontend/images/empty_cart.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    `;
                    
                }
            })
        }

    }
    console.log(deleteBtn)
</script>