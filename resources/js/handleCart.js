import { showToast, showToastDanger } from './toastify.js'
document.querySelectorAll('.btn-delete-cart').forEach(btn => {
    btn.addEventListener('click', async () => {
        const cartId = btn.dataset.id
        const cartColor = btn.dataset.color
        const cartSize = btn.dataset.size
        try {
            const res = await fetch(`/cart/remove/${cartId}?color=${cartColor}&size=${cartSize}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            if (!res.ok) throw new Error('Xóa không thành công')
            const data = await res.json()
            showToast(data.message)
            btn.closest('.cart-item').remove()
        } catch (error) {
            console.error(error);
        }
    })
})
