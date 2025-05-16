import { showToast, showToastDanger } from './toastify.js'

//xử lý add cart
const formAddCart = document.querySelector('#addFormCart')
if (formAddCart) {
    formAddCart.addEventListener('submit', async (e) => {
        e.preventDefault()
        const formData = new FormData(formAddCart)
        // console.table(Object.fromEntries(formData.entries()));
        const cartId = document.querySelector('.add-to-cart').getAttribute('data-id')
        formData.append('id', cartId)

        try {
            const res = await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            if (!res.ok) {
               throw new Error('Thêm thất bại')
            }
            const result = await res.json()
            showToast(result.message)
        } catch (error) {
            console.log(error);
            showToast('Có lỗi xảy ra, vui lòng thử lại!');
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
            if (!res.ok) throw new Error('Xóa không thành công')
            const data = await res.json()
            showToast(data.message)
            btn.closest('.cart-item').remove()
            document.querySelector('.total-cart').textContent = `(${data.totalQuantity})`

            const totalPrice = await fetch('/cart/update', {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            if (totalPrice.ok) {
                const data = await totalPrice.json()
                document.querySelector('.total-price').textContent = data.totalPrice.toLocaleString('vi-VN') + 'đ'
            }
        } catch (error) {
            console.error(error);
        }
    })
})
