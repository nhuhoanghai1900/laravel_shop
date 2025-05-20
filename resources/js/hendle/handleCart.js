import { showToast, showToastDanger } from '../toast/toastify.js'

//xử lý add cart
const formAddCart = document.querySelector('#addFormCart')
if (formAddCart) {
    formAddCart.addEventListener('submit', async (e) => {
        e.preventDefault()
        const formData = new FormData(formAddCart)
        const cartId = document.querySelector('.add-to-cart').getAttribute('data-id')
        formData.append('id', cartId)
        try {
            const res = await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData
            })
            const result = await res.json()
            if (!res.ok) {
               throw new Error(result.message)
            } else {
                showToast(result.message)
                document.querySelector('.cart-header').textContent = `(${result.totalQuantity})`
            }
        } catch (error) {
            console.log(error)
            showToastDanger(error.message)
        }
    })
}

//xử lý reemove cart
document.querySelectorAll('.btn-delete-cart').forEach(btn => {
    btn.addEventListener('click', async () => {
        const cartId = btn.dataset.id
        const cartColor = btn.dataset.color
        const cartSize = btn.dataset.size
        try {
            const res = await fetch(`/cart/remove/${cartId}?color=${cartColor}&size=${cartSize}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            const result = await res.json()
            if (!res.ok) {
                throw new Error(result.message)
            } else {
                showToast(result.message)
                btn.closest('.cart-item').remove()
                document.querySelector('.total-cart').textContent = `(${result.totalQuantity})`
                document.querySelector('.cart-header').textContent = `(${result.totalQuantity})`
                document.querySelector('.total-price').textContent = result.totalPrice.toLocaleString('vi-VN') + 'đ'
                if(result.totalQuantity === 0) {
                    document.querySelector('.empty-text-cart').style.display = 'block'
                }
            }
        } catch (error) {
            console.error(error)
            showToastDanger(error.message)
        }
    })
})


