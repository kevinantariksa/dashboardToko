@extends('layouts.homeAdmin')

@section('content')
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="POST" action="{{url('/storeTransaksi')}}">
            {{csrf_field()}}
            <fieldset>
                <legend>Input Transaksi Baru</legend>
            <br>

            <div class="form-group shop-items"> 
                <label for="exampleSelect1">List Barang</label><br>
                <div class="shop-item">
                    <?php foreach ($barang as $brg): ?>
                        <label>
                            
                            <span class="shop-item-title">
                                {{$brg->nama_barang}} <br>
                            </span> 
                            <span class="shop-item-details">
                            Harga: Rp <span class="shop-item-price" value={{$brg->harga_jual}}>{{$brg->harga_jual}}</span>
                                <div class="shop-item-stock">
                                <span style="display: none" class="shop-stok" name="stok[]" value={{$brg->stok_barang}}>{{$brg->stok_barang}}</span>
                                <span style="display: none" class="shop-item-modal" name="modal[]"  value={{$brg->harga_modal}}>{{$brg->harga_modal}}</span>
                                Stok: {{$brg->stok_barang}}</div>
                                <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                            </span>
                        </label>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>

            <section class="container content-section">
                <h2 class="section-header">Barang yang dibeli</h2>
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column"></span>
                    <span class="cart-price cart-header cart-column"></span>
                    <span class="cart-modal cart-header cart-column" style="visibility: none"></span>
                    <span class="cart-quantity cart-header cart-column"></span>
                </div>
                <div class="cart-items">
                </div>
                <div class="cart-total">
                    <strong class="cart-total-title">Total</strong>
                    <span class="cart-total-price" >RP 0</span>
                    <input id="cart-total-sum" name="total" type="hidden">  
                    <input type="hidden" name="profit" id="profit">                  
                </div>

            <div class="form-group">
                <label for="exampleSelect1">Nomor Nota</label>
                <input type="number" name="nomor_nota" >
            </div>
            <!-- kurang nilai transaksi -->
            

            <div class="form-group">
                <label class="control-label">Pembayaran</label>
                <input name="status" type="text"  class="form-control" placeholder="misal: Lunas/DP" >
            </div>

            <div class="form-group">
                <label class="control-label">Customer / Note</label>
                <input name="keterangan" type="text"  class="form-control" >
            </div>
            </section>
            </fieldset>
            
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{url('/transaksi')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
</div>

<script>
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
        
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}

function purchaseClicked() {
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }

    updateCartTotal()
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var modal = shopItem.getElementsByClassName('shop-item-modal')[0].innerText
    var stok = shopItem.getElementsByClassName('shop-stok')[0].innerText
    addItemToCart(title, price, modal, stok)
    updateCartTotal()
    
}

function addItemToCart(title, price, modal,stok) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].value == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <span class="cart-item-title" >${title}</span>
            <input class="cart-item-title" type="hidden" name="nama_barang[]" value="${title}">
        </div>
        <span class="cart-price cart-column">${price}</span>
        <input type="hidden" class="shop-stok" name="stok[]" value={{$brg->stok_barang}}>
        <input type="hidden" class="cart-modal" name="modal[]"  value="${modal}">
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" name="jumlah[]" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
    
    
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    var profit = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var modalElement = cartRow.getElementsByClassName('cart-modal')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('Rp', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
        profit = profit + ((price - modalElement.value) * quantity)
        price = parseFloat(modalElement.innerText.replace('Rp', ''))
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Rp ' + total
    document.getElementById('cart-total-sum').value= total
    document.getElementById('profit').value=profit
    
}
</script>
@endsection